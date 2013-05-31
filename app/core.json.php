{
	"_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
	"core": {
		"default_locale": "en_GB"
	},
	"block_storage": {
		"smalldb": {
			"storage_class": "Smalldb\\Cascade\\BlockStorage",
			"storage_weight": 20,
			"alias": "smalldb",
			"backend_class": "Smalldb\\StateMachine\\SimpleBackend"
		}
	},
	"block:config": {
		".block": "core/config"
	},
	"block:smalldb": {
		".block": "smalldb/init",
		"config": [
			"config:entities.entities"
		]
	},
	"block:router": {
		".block": "core/router",
		"routes": [
			"config:routes"
		]
	},
	"block:main": {
		".block": "core/value/block_loader",
		"block": [
			"router:block"
		],
		"block_fmt": [
			"router:block_fmt"
		],
		"connections": [
			"router:connections"
		],
		"output_forward": "done,title,type",
		"enable": [
			":and",
			"router:done",
			"smalldb:done"
		]
	},
	"block:skeleton": {
		".block": "page/skeleton",
		"enable": [
			":and",
			"router:skeleton",
			"main:done"
		]
	},
	"block:error_page": {
		".block": "page/error",
		"enable": [
			":not",
			"main:done"
		]
	},
	"block:page_title": {
		".block": "core/out/set_page_title",
		"title": [
			":or",
			"main:title",
			"router:title"
		],
		"format": [
			"router:title_fmt"
		],
		"enable": [
			"main:done"
		]
	},
	"block:page_type": {
		".block": "core/out/set_type",
		"type": [
			":or",
			"main:type",
			"router:type"
		],
		"enable": [
			"main:done"
		]
	}
}
