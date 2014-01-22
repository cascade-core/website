{
    "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
    "outputs": {
        "done": 1,
        "title": "Cascade skeleton"
    },
    "blocks": {
        "skeleton": {
            "block": "core/out/page",
            "x": 13,
            "y": 29
        },
        "slot_header": {
            "block": "core/out/slot",
            "x": 274,
            "y": 156,
            "in_con": {
                "slot": [
                    "slot_holder",
                    "name"
                ]
            },
            "in_val": {
                "slot_weight": 10,
                "name": "header"
            }
        },
        "slot_default": {
            "block": "core/out/slot",
            "x": 273,
            "y": 559,
            "in_con": {
                "slot": [
                    "slot_holder",
                    "name"
                ]
            },
            "in_val": {
                "slot_weight": 50,
                "name": "default"
            }
        },
        "slot_footer": {
            "block": "core/out/slot",
            "x": 275,
            "y": 703,
            "in_con": {
                "slot": [
                    "slot_holder",
                    "name"
                ]
            },
            "in_val": {
                "slot_weight": 90,
                "name": "footer"
            }
        },
        "main_menu": {
            "block": "core/out/menu",
            "x": 537,
            "y": 181,
            "in_con": {
                "items": [
                    "config",
                    "main_menu"
                ],
                "active_uri": [
                    "router",
                    "path"
                ],
                "slot": [
                    "slot_header",
                    "name"
                ]
            },
            "in_val": {
                "layout": "row",
                "max_depth": 0,
                "slot_weight": 20
            }
        },
        "message_queue": {
            "block": "core/out/message_queue",
            "x": 507,
            "y": 586,
            "in_con": {
                "slot": [
                    "slot_default",
                    "name"
                ]
            },
            "in_val": {
                "slot_weight": 1
            }
        },
        "html_head": {
            "block": "core/out/raw",
            "x": 277,
            "y": 21,
            "in_con": {
                "enable": [
                    "skeleton",
                    "done"
                ]
            },
            "in_val": {
                "slot": "html_head",
                "slot_weight": 20,
                "data": "<!-- html head -->\n<link rel='stylesheet' href='/core/style/basic.css' type='text/css'>\n<link rel='stylesheet' href='/app/style/main.css' type='text/css'>\n\n<script type=text/javascript>\n  var _gaq = _gaq || [];\n  _gaq.push(['_setAccount', 'UA-22907817-2']);\n  _gaq.push(['_trackPageview']);\n  (function() {\n    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;\n    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';\n    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);\n  })();\n</script>"
            }
        },
        "site_header": {
            "block": "core/out/header",
            "x": 531,
            "y": 0,
            "in_val": {
                "level": 1,
                "text": "Cascade",
                "link": "/",
                "slot_weight": 10
            },
            "in_con": {
                "slot": [
                    "slot_header",
                    "name"
                ]
            }
        },
        "slot_holder": {
            "block": "core/out/slot",
            "x": 0,
            "y": 335,
            "in_val": {
                "slot": "html_body",
                "slot_weight": 20,
                "name": "page_holder"
            }
        },
        "footer_version": {
            "block": "git/version",
            "x": 514,
            "y": 700,
            "in_val": {
                "link": "/admin/devel/version",
                "slot_weight": 60
            },
            "in_con": {
                "slot": [
                    "slot_footer",
                    "name"
                ]
            }
        }
    }
}