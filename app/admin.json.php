{
    "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
    "main_menu": {
        "documentation": {
            "children": {
                "doxygen": {
                    "title": "Doxygen docs",
                    "link": "/admin/doc/doxygen"
                }
            }
        },
        "exit": {
            "title": "Exit administration",
            "link": "/",
            "weight": 90
        }
    },
    "common_block": "admin_extras",
    "routes": {
        "/doc/doxygen": {
            "title": "Doxygen documentation",
            "block": "page/doxygen_links",
            "connections": [

            ]
        }
    }
}
