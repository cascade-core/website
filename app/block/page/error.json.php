{
    "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
    "outputs": {
        "done": 1,
        "title": "Page not found"
    },
    "blocks": {
        "h1": {
            "block": "core/out/header",
            "x": 182,
            "y": 0,
            "in_val": {
                "level": 1,
                "slot_weight": 1
            },
            "in_con": {
                "text": [
                    "page_title",
                    "title"
                ]
            }
        },
        "page_error": {
            "block": "core/out/message",
            "x": 335,
            "y": 0,
            "in_val": {
                "is_error": 1,
                "title": "Sorry!",
                "text": "Page not found.",
                "http_status_code": 404
            }
        },
        "skeleton": {
            "block": "page/skeleton",
            "x": 0,
            "y": 18
        }
    }
}