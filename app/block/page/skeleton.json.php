{
    "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
    "outputs": {
        "done": 1,
        "title": "Cascade skeleton"
    },
    "block:skeleton": {
        ".block": "core/out/page",
        ".x": 13,
        ".y": 29
    },
    "block:slot_header": {
        ".block": "core/out/slot",
        ".x": 274,
        ".y": 156,
        "slot": [
            "slot_holder:name"
        ],
        "slot_weight": 10,
        "name": "header"
    },
    "block:slot_default": {
        ".block": "core/out/slot",
        ".x": 273,
        ".y": 559,
        "slot": [
            "slot_holder:name"
        ],
        "slot_weight": 50,
        "name": "default"
    },
    "block:slot_footer": {
        ".block": "core/out/slot",
        ".x": 275,
        ".y": 703,
        "slot": [
            "slot_holder:name"
        ],
        "slot_weight": 90,
        "name": "footer"
    },
    "block:main_menu": {
        ".block": "core/out/menu",
        ".x": 537,
        ".y": 181,
        "items": [
            "config:main_menu"
        ],
        "layout": "row",
        "active_uri": [
            "router:path"
        ],
        "max_depth": 0,
        "slot": [
            "slot_header:name"
        ],
        "slot_weight": 20
    },
    "block:message_queue": {
        ".block": "core/out/message_queue",
        ".x": 507,
        ".y": 586,
        "slot": [
            "slot_default:name"
        ],
        "slot_weight": 1
    },
    "block:html_head": {
        ".block": "core/out/raw",
        ".x": 277,
        ".y": 21,
        "enable": [
            "skeleton:done"
        ],
        "data": "<!-- html head -->\n<link rel='stylesheet' href='/core/style/basic.css' type='text/css'>\n<link rel='stylesheet' href='/app/style/main.css' type='text/css'>\n\n<script type=text/javascript>\n  var _gaq = _gaq || [];\n  _gaq.push(['_setAccount', 'UA-22907817-2']);\n  _gaq.push(['_trackPageview']);\n  (function() {\n    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;\n    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';\n    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);\n  })();\n</script>",
        "slot": "html_head",
        "slot_weight": 20
    },
    "block:site_header": {
        ".block": "core/out/header",
        ".x": 531,
        ".y": 0,
        "level": 1,
        "text": "Cascade",
        "link": "/",
        "slot": [
            "slot_header:name"
        ],
        "slot_weight": 10
    },
    "block:slot_holder": {
        ".block": "core/out/slot",
        ".x": 0,
        ".y": 335,
        "slot": "html_body",
        "slot_weight": 20,
        "name": "page_holder"
    },
    "block:footer_version": {
        ".block": "git/version",
        ".x": 514,
        ".y": 700,
        "link": "/git",
        "slot": [
            "slot_footer:name"
        ],
        "slot_weight": 60
    }
}