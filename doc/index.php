<!DOCTYPE HTML>
<html>
<head>
	<title>Documentation</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
		body {
			margin: 5rem auto;
			max-width: 60rem;
			background: #fff;
			color: #000;
		}

		h1 {
			font-size: 3rem;
			font-weight: normal;
			margin: 3rem 0rem 3rem 0rem;
			color: #aaa;
		}

		dl {
			margin: 0rem 0rem;
		}

		dl dt {
			margin: 2rem 0rem 0rem 0rem;
			font-weight: bold;
			break-after: avoid;
			break-inside: avoid;
		}

		dl dd {
			margin: 0rem 0rem 0rem 2rem;
		}
	</style>
</head>
<body>
	<h1>Documentation</h1>

<?php
	echo "<dl>\n";
	foreach (scandir('.') as $project) {
		$project_dir = "./$project";
		if ($project[0] == '.' || !is_dir($project_dir)) {
			continue;
		}
		echo "<dt>", htmlspecialchars($project), "</dt>\n";

		echo "<dd>\n";
		$versions = scandir($project_dir, SCANDIR_SORT_NONE);
		rsort($versions, SORT_NATURAL);
		$first = true;
		$master_version_dir = $project_dir."/master";
		if (is_dir($master_version_dir)) {
			$first = false;
			echo "<a href=\"", htmlspecialchars($master_version_dir), "\">master</a>";
		}
		foreach ($versions as $version) {
			$version_dir = "$project_dir/$version";
			if ($version[0] == '.' || !is_dir($version_dir) || $version == 'master') {
				continue;
			}
			if ($first) {
				$first = false;
			} else {
				echo ", ";
			}
			echo "<a href=\"", htmlspecialchars($version_dir), "\">$version</a>";
		}
		echo "</dd>\n";
	}
	echo "</dl>\n";
?>
</body>
</html>


