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
						},
						"block": {
							"inputs": {
								"item": []
							},
							"outputs": {
								"id": "return_value"
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
						},
						"block": {
							"inputs": {
								"id": [],
								"item": []
							},
							"outputs": {
								"id": "id"
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
						},
						"block": {
							"inputs": {
								"id": []
							},
							"outputs": {
							}
						}
					}
				}
			}
		},
		"auction_item": {
			"state_machine": {
				"class": "\\SmallDb\\StateMachine\\ArrayMachine",
				"states": {
					"preparing": {
						"label": "Příprava aukce"
					},
					"finished": {
						"label": "Aukce ukončena"
					},
					"limiting": {
						"label": "Limitování",
						"group": "pre_auction"
					},
					"pre_auction": {
						"label": "Před-aukce",
						"group": "pre_auction"
					},
					"hall_auction": {
						"label": "Sálová aukce",
						"group": "auction"
					},
					"online_auction_waiting": {
						"label": "Čeká v pořadí",
						"group": "online_auction"
					},
					"online_auction_active": {
						"label": "Aktivní",
						"group": "online_auction"
					},
					"online_auction_done": {
						"label": "Ukončeno",
						"group": "online_auction"
					},
					"e_auction_active": {
						"label": "Aktivní",
						"group": "e_auction"
					},
					"e_auction_done": {
						"label": "Ukončeno",
						"group": "e_auction"
					},
					"store_active": {
						"label": "Aktivní",
						"group": "store"
					},
					"store_sold": {
						"label": "Prodáno",
						"group": "store"
					}
				},
				"state_groups": {
					"auction": {
						"color": "transparent",
						"groups": {
							"pre_auction": {
								"color": "transparent"
							},
							"online_auction": {
								"label": "Online aukce",
								"color": "#66cc22"
							}
						}
					},
					"misc": {
						"color": "transparent",
						"groups": {
							"e_auction": {
								"label": "e-aukce",
								"color": "#6666cc"
							},
							"store": {
								"label": "Obchod",
								"color": "#aa6622"
							}
						}
					}
				},
				"actions": {
					"create": {
						"transitions": {
							"": {
								"targets": [ "preparing" ]
							}
						}
					},
					"edit": {
						"transitions": {
							"preparing": {
								"targets": [ "preparing" ]
							}
						}
					},
					"publish": {
						"transitions": {
							"preparing": {
								"targets": [ 
									"limiting", "pre_auction",
									"hall_auction", "online_auction_waiting", "e_auction_active",
									"store_active"
								]
							}
						}
					},
					"next": {
						"transitions": {
							"limiting": {
								"targets": [ "hall_auction", "online_auction_waiting" ]
							},
							"pre_auction": {
								"targets": [ "hall_auction", "online_auction_waiting" ]
							},
							"hall_auction": {
								"targets": [ "finished" ]
							},
							"online_auction_done": {
								"targets": [ "finished" ]
							},
							"e_auction_done": {
								"targets": [ "finished" ]
							},
							"store_active": {
								"targets": [ "finished" ]
							},
							"store_sold": {
								"targets": [ "finished" ]
							}
						}
					},
					"limit": {
						"transitions": {
							"limiting": {
								"targets": [ "limiting" ]
							}
						}
					},
					"pre_bid": {
						"transitions": {
							"pre_auction": {
								"targets": [ "pre_auction" ]
							}
						}
					},
					"hall_set_results": {
						"transitions": {
							"hall_auction": {
								"targets": [ "hall_auction" ]
							}
						}
					},
					"e_bid": {
						"transitions": {
							"e_auction_active": {
								"targets": [ "e_auction_active" ]
							}
						}
					},
					"e_stop": {
						"transitions": {
							"e_auction_active": {
								"targets": [ "e_auction_done" ]
							}
						}
					},
					"online_start": {
						"transitions": {
							"online_auction_waiting": {
								"targets": [ "online_auction_active" ]
							}
						}
					},
					"online_bid": {
						"transitions": {
							"online_auction_active": {
								"targets": [ "online_auction_active" ]
							}
						}
					},
					"online_going": {
						"transitions": {
							"online_auction_active": {
								"targets": [ "online_auction_active" ]
							}
						}
					},
					"online_stop": {
						"transitions": {
							"online_auction_active": {
								"targets": [ "online_auction_done" ]
							}
						}
					},
					"online_back": {
						"transitions": {
							"online_auction_done": {
								"targets": [ "online_auction_active" ]
							}
						}
					},
					"store_sell": {
						"transitions": {
							"store_active": {
								"targets": [ "store_sold" ]
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
