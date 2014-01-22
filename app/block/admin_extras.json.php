{
    "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
    "outputs": {
        "done": 1,
        "title": "Cascade skeleton"
    },
    "blocks": {
        "html_head": {
            "block": "core/out/raw",
            "x": 0,
            "y": 1,
            "in_con": {
                "enable": [
                    "skeleton",
                    "done"
                ]
            },
            "in_val": {
                "slot": "html_head",
                "slot_weight": 20,
                "data": "<!-- html head -->\n<link rel='stylesheet' href='/app/style/main.css' type='text/css'>\n\n<script type=text/javascript>\n  var _gaq = _gaq || [];\n  _gaq.push(['_setAccount', 'UA-22907817-2']);\n  _gaq.push(['_trackPageview']);\n  (function() {\n    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;\n    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';\n    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);\n  })();\n</script>"
            }
        },
        "main_menu": {
            "block": "core/out/menu",
            "x": 122,
            "y": 0,
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
        }
    }
}