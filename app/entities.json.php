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
		}
	}
}
