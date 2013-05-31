{
	"_": "<?php printf('_%c%c}%c',34,10,10);__halt_compiler();?>",
	"info": {
		"title": "Entities"
	},
	"entities": {
		"item": {
			"state_machine": {
				"class": "\\SmallDb\\StateMachine\\ArrayMachine",
				"states": {
					"exists": {
						"description": "Some general item"
					}
				},
				"actions": {
					"create": {
						"description": "Create new item",
						"transitions": {
							"": {
								"targets": [ "exists" ],
								"permissions": {
									"group": "users"
								}
							}
						}
					},
					"edit": {
						"description": "Modify item",
						"transitions": {
							"exists": {
								"targets": [ "exists" ],
								"permissions": {
									"owner": true
								}
							}
						}
					},
					"delete": {
						"description": "Destroy item",
						"transitions": {
							"exists": {
								"targets": [ "" ],
								"permissions": {
									"owner": true
								}
							}
						}
					}
				}
			}
		},
		"article": {
			"state_machine": {
				"class": "\\SmallDb\\StateMachine\\ArrayMachine",
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
								"targets": [ "writing" ]
							}
						}
					},
					"edit": {
						"transitions": {
							"writing": {
								"targets": [ "writing" ]
							},
							"submitted": {
								"targets": [ "submitted" ]
							}
						}
					},
					"submit": {
						"transitions": {
							"writing": {
								"targets": [ "submitted" ]
							}
						}
					},
					"withdraw": {
						"transitions": {
							"submitted": {
								"targets": [ "writing" ]
							}
						}
					},
					"return": {
						"transitions": {
							"submitted": {
								"targets": [ "writing" ]
							}
						}
					},
					"accept": {
						"transitions": {
							"submitted": {
								"targets": [ "waiting", "published" ]
							}
						}
					},
					"publish": {
						"transitions": {
							"waiting": {
								"targets": [ "published" ]
							}
						}
					},
					"hide": {
						"transitions": {
							"published": {
								"targets": [ "submitted" ]
							}
						}
					},
					"reject": {
						"transitions": {
							"submitted": {
								"targets": [ "rejected" ]
							}
						}
					}
				}
			}
		}
	}
}
