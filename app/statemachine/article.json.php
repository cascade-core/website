{
    "_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
    "description": "Article.",
    "class": "\\Smalldb\\StateMachine\\ArrayMachine",
    "states": {
        "writing": {
            "description": ""
        },
        "submitted": {
            "description": ""
        },
        "waiting": {
            "description": ""
        },
        "published": {
            "description": ""
        },
        "rejected": {
            "description": ""
        }
    },
    "actions": {
        "create": {
            "returns": "new_id",
            "transitions": {
                "": {
                    "targets": [
                        "writing"
                    ]
                }
            }
        },
        "edit": {
            "transitions": {
                "writing": {
                    "targets": [
                        "writing"
                    ]
                },
                "submitted": {
                    "targets": [
                        "submitted"
                    ]
                }
            }
        },
        "submit": {
            "transitions": {
                "writing": {
                    "targets": [
                        "submitted"
                    ]
                }
            }
        },
        "withdraw": {
            "transitions": {
                "submitted": {
                    "targets": [
                        "writing"
                    ]
                }
            }
        },
        "return": {
            "transitions": {
                "submitted": {
                    "targets": [
                        "writing"
                    ]
                }
            }
        },
        "accept": {
            "transitions": {
                "submitted": {
                    "targets": [
                        "waiting",
                        "published"
                    ]
                }
            }
        },
        "publish": {
            "transitions": {
                "waiting": {
                    "targets": [
                        "published"
                    ]
                }
            }
        },
        "hide": {
            "transitions": {
                "published": {
                    "targets": [
                        "submitted"
                    ]
                }
            }
        },
        "reject": {
            "transitions": {
                "submitted": {
                    "targets": [
                        "rejected"
                    ]
                }
            }
        }
    }
}

