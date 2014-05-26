{
    "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
    "core": {
    },
    "context": {
        "default_locale": "en_GB",
        "resources": {
            "smalldb": {
                "class": "Smalldb\\StateMachine\\JsonDirBackend",
                "base_dir": "{DIR_APP}statemachine/"
            }
        }
    },
    "block_storage": {
        "smalldb": {
            "storage_class": "Smalldb\\Cascade\\BlockStorage",
            "storage_weight": 20,
            "backend_resource": "smalldb"
        }
    },
    "blocks": {
        "config": {
            "block": "core/config"
        },
        "router": {
            "block": "core/router",
            "in_con": {
                "routes": [
                    "config",
                    "routes"
                ]
            }
        },
        "main": {
            "block": "core/value/block_loader",
            "in_con": {
                "block": [
                    "router",
                    "block"
                ],
                "block_fmt": [
                    "router",
                    "block_fmt"
                ],
                "connections": [
                    "router",
                    "connections"
                ],
                "enable": [
                    "router",
                    "done"
                ]
            },
            "in_val": {
                "output_forward": "done,title,type"
            }
        },
        "skeleton": {
            "block": "skeleton",
            "in_con": {
                "enable": [
                    ":and",
                    "router",
                    "skeleton",
                    "main",
                    "done"
                ]
            }
        },
        "error_page": {
            "block": "page/error",
            "in_con": {
                "enable": [
                    ":not",
                    "main",
                    "done"
                ]
            }
        },
        "page_title": {
            "block": "core/out/set_page_title",
            "in_con": {
                "title": [
                    ":or",
                    "main",
                    "title",
                    "router",
                    "title"
                ],
                "format": [
                    "router",
                    "title_fmt"
                ],
                "enable": [
                    "main",
                    "done"
                ]
            }
        },
        "page_type": {
            "block": "core/out/set_type",
            "in_con": {
                "type": [
                    ":or",
                    "main",
                    "type",
                    "router",
                    "type"
                ],
                "enable": [
                    "main",
                    "done"
                ]
            }
        }
    }
}
