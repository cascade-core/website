{
    "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
    "description": "Article designed in yEd",
    "class": "\\Smalldb\\StateMachine\\ArrayMachine",
    "properties": {
        "id": {
            "name": "id",
            "type": "text"
        },
        "title": {
            "name": "title",
            "type": "text"
        },
        "body": {
            "name": "body",
            "type": "markdown"
        },
        "author": {
            "name": "author",
            "type": "user"
        },
        "published": {
            "name": "published",
            "type": "timestamp"
        }
    },
    "states": {
        "published": {
            "url": "",
            "label": "Published",
            "color": "#99FF33"
        },
        "rejected": {
            "url": "",
            "label": "Rejected",
            "color": "#FF6633"
        },
        "submitted": {
            "url": "",
            "label": "Submitted",
            "color": "#EEEEEE"
        },
        "waiting": {
            "url": "",
            "label": "Waiting",
            "color": "#EEEEEE"
        },
        "writing": {
            "url": "",
            "label": "Writing",
            "color": "#EEEEEE"
        }
    },
    "actions": {
        "create": {
            "transitions": {
                "": {
                    "label": "create",
                    "targets": [
                        "writing"
                    ]
                }
            }
        },
        "publish": {
            "transitions": {
                "waiting": {
                    "label": "publish",
                    "targets": [
                        "published"
                    ]
                }
            }
        },
        "submit": {
            "transitions": {
                "writing": {
                    "label": "submit",
                    "targets": [
                        "submitted"
                    ]
                }
            }
        },
        "accept": {
            "transitions": {
                "submitted": {
                    "label": "accept",
                    "targets": [
                        "waiting",
                        "published"
                    ]
                }
            }
        },
        "reject": {
            "transitions": {
                "submitted": {
                    "label": "reject",
                    "targets": [
                        "rejected"
                    ]
                }
            }
        },
        "hide": {
            "transitions": {
                "published": {
                    "label": "hide",
                    "targets": [
                        "submitted"
                    ]
                }
            }
        },
        "return": {
            "transitions": {
                "submitted": {
                    "label": "return",
                    "targets": [
                        "writing"
                    ]
                }
            }
        },
        "withdraw": {
            "transitions": {
                "submitted": {
                    "label": "withdraw",
                    "targets": [
                        "writing"
                    ]
                }
            }
        },
        "edit": {
            "transitions": {
                "submitted": {
                    "label": "edit",
                    "targets": [
                        "submitted"
                    ]
                },
                "writing": {
                    "label": "edit",
                    "targets": [
                        "writing"
                    ]
                }
            }
        }
    }
}