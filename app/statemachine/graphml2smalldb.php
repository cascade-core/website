#!/usr/bin/env php
<?php
/*
 * Copyright (c) 2014, Josef Kufner  <jk@frozen-doe.net>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */

function graphml2smalldb($graphml_string)
{
	// Graph
	$keys = array();
	$nodes = array();
	$edges = array();

	// Load GraphML into DOM
	$dom = new DOMDocument;
	$dom->loadXML($graphml_string);

	// Prepare XPath query engine
	$xpath = new DOMXpath($dom);
	$xpath->registerNameSpace('g', 'http://graphml.graphdrawing.org/xmlns');

	// Load keys
	foreach($xpath->query('/g:graphml/g:key[@attr.name][@id]') as $el) {
		$id = $el->attributes->getNamedItem('id')->value;
		$name = $el->attributes->getNamedItem('attr.name')->value;
		echo "tag> ", $id, " => ", $name, "\n";
		$keys[$id] = $name;
	}

	// Load graph properties
	$graph_props = array();
	foreach($xpath->query('//g:graph/g:data[@key]') as $data_el) {
		$k = $data_el->attributes->getNamedItem('key')->value;
		if (isset($keys[$k])) {
			if ($keys[$k] == 'properties') {
				// Special handling of machine properties
				$properties = array();
				foreach ($xpath->query('./property[@name]', $data_el) as $property_el) {
					$property_name = $property_el->attributes->getNamedItem('name')->value;
					foreach ($property_el->attributes as $property_attr_name => $property_attr) {
						$properties[$property_name][$property_attr_name] = $property_attr->value;
					}
				}
				$graph_props['properties'] = $properties;
			} else {
				$graph_props[$keys[$k]] = trim($data_el->textContent);
			}
		}
	}
	//print_r($graph_props);

	// Load nodes
	foreach($xpath->query('//g:graph/g:node[@id]') as $el) {
		$id = $el->attributes->getNamedItem('id')->value;
		$node_props = array();
		foreach($xpath->query('.//g:data[@key]', $el) as $data_el) {
			$k = $data_el->attributes->getNamedItem('key')->value;
			if (isset($keys[$k])) {
				$node_props[$keys[$k]] = $data_el->textContent;
			}
		}
		$label = $xpath->query('.//y:NodeLabel', $el)->item(0)->textContent;
		if ($label !== null) {
			$node_props['label'] = trim($label);
		}
		$color = $xpath->query('.//y:Fill', $el)->item(0)->attributes->getNamedItem('color')->value;
		if ($color !== null) {
			$node_props['color'] = trim($color);
		}
		echo "node> ", $id, ": \"", @ $node_props['state'], "\"\n";
		//print_r($node_props);
		$nodes[$id] = $node_props;
	}

	// Load edges
	foreach($xpath->query('//g:graph/g:edge[@id][@source][@target]') as $el) {
		$id = $el->attributes->getNamedItem('id')->value;
		$source = $el->attributes->getNamedItem('source')->value;
		$target = $el->attributes->getNamedItem('target')->value;
		$edge_props = array();
		foreach($xpath->query('.//g:data[@key]', $el) as $data_el) {
			$k = $data_el->attributes->getNamedItem('key')->value;
			if (isset($keys[$k])) {
				$edge_props[$keys[$k]] = $data_el->textContent;
			}
		}
		$label = $xpath->query('.//y:EdgeLabel', $el)->item(0)->textContent;
		if ($label !== null) {
			$edge_props['label'] = trim($label);
		}
		echo "edge> ", $id, ": ", $source, " -> ", $target, "\n";
		//print_r($edge_props);
		$edges[$id] = array($source, $target, $edge_props);
	}

	// Build machine definition
	$machine = array('_' => "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>");

	// Graph properties
	foreach($graph_props as $k => $v) {
		$machine[$k] = $v;
	}

	// Store states
	foreach ($nodes as $n) {
		$state = (string) @ $n['state'];
		if ($state == '' && @ $n['label'] != '') {
			throw new Exception(sprintf('Missing "state" property at node "%s".', $n['label']));
		}
		if ($state == '') {
			// skip 'nonexistent' state, it is present by default
			continue;
		}
		unset($n['state']);
		$machine['states'][$state] = $n;
	}

	// Store actions and transitions
	foreach ($edges as $e) {
		list($source_id, $target_id, $props) = $e;
		$source = (string) @ $nodes[$source_id]['state'];
		$target = (string) @ $nodes[$target_id]['state'];
		if (@ $props['action'] != '') {
			$action = $props['action'];
		} else if (@ $props['label'] != '') {
			$action = $props['label'];
		} else {
			throw new Exception(sprintf('Missing label at edge "%s" -> "%s".',
				$nodes[$source]['label'] ? : @ $nodes[$source]['state'],
				$nodes[$target]['label'] ? : @ $nodes[$target]['state']));
		}

		$tr = & $machine['actions'][$action]['transitions'][$source];
		foreach ($props as $k => $v) {
			$tr[$k] = $v;
		}
		$tr['targets'][] = $target;
		unset($tr);

		asort($machine['states']);
		asort($machine['actions']);
	}

	return $machine;
}

/****************************************************************************/

if (count($argv) != 3) {
	die(sprintf('Usage: %s input-file.graphml output-file.json', $argv[0]));
}

$input_file  = $argv[1] == '-' ? 'php://stdin'  : $argv[1];
$output_file = $argv[2] == '-' ? 'php://stdout' : $argv[2];

file_put_contents($output_file, json_encode(graphml2smalldb(file_get_contents($input_file)), JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));

