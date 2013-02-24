{
        "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
	"defaults": {
		"title_fmt": "%s - Cascade",
		"title": "(missing title)",
		"type": "html5",
		"block": null,
		"connections": {}
	},
	"groups": {
		"basic": {
			"require": {
			},
			"defaults": {
				"skeleton": true
			},
			"routes": {
				"/": {
					"title": "Hello",
					"block": "page/hello",
					"connections": {
					}
				},
				"/documentation": {
					"title": "Documentation",
					"block": "core/page/doc"
				},
				"/documentation/block/**": {
					"title": "Documentation",
					"block": "core/page/doc_show"
				},
				"/profiler": {
					"title": "Profiler",
					"block": "page/profiler"
				},
				"/admin": {
					"title": "Administration",
					"block": "admin/main",
					"skeleton": false
				},
				"/admin/**": {
					"title": "Administration",
					"block": "admin/main",
					"connections": {
						"path": [ "router", "path_tail" ]
					},
					"skeleton": false
				}
			}
		}
	},
	"reverse_routes": {
		"admin": {
			"url": "/admin/{block}",
			"args": [ "block" ]
		},
		"documentation": {
			"url": "/documentation/block/{block}",
			"args": [ "block" ]
		}
	}
}

