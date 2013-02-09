;<?php exit(); __HALT_COMPILER; ?>


[outputs]
done = "1"
title = "Cascade skeleton"

[block:skeleton]
.block = "core/out/page"
.x = 13
.y = 29

[block:slot_header]
.block = "core/out/slot"
.x = 274
.y = 156
slot[] = "slot_holder:name"
slot_weight = "10"
name = "header"

[block:slot_default]
.block = "core/out/slot"
.x = 273
.y = 559
slot[] = "slot_holder:name"
slot_weight = "50"
name = "default"

[block:slot_footer]
.block = "core/out/slot"
.x = 275
.y = 703
slot[] = "slot_holder:name"
slot_weight = "90"
name = "footer"

[block:menu_builder]
.block = "core/ini/router_links"
.x = 267
.y = 327
config[] = "load_routes:data"

[block:main_menu]
.block = "core/out/menu"
.x = 537
.y = 181
items[] = "menu_builder:links"
layout = "row"
active_uri[] = "router:path"
max_depth = "0"
slot[] = "slot_header:name"
slot_weight = "20"

[block:message_queue]
.block = "core/out/message_queue"
.x = 507
.y = 586
slot[] = "slot_default:name"
slot_weight = "1"

[block:html_head]
.block = "core/out/raw"
.x = 277
.y = 21
enable[] = "skeleton:done"
data = "<!-- html head -->
<link rel='stylesheet' href='/core/style/basic.css' type='text/css'>
<link rel='stylesheet' href='/app/style/main.css' type='text/css'>
"
slot = "html_head"
slot_weight = "20"

[block:site_header]
.block = "core/out/header"
.x = 531
.y = 0
level = "1"
text = "Cascade"
link = "/"
slot[] = "slot_header:name"
slot_weight = "10"

[block:slot_holder]
.block = "core/out/slot"
.x = 0
.y = 335
slot = "html_body"
slot_weight = "20"
name = "page_holder"

[block:footer_version]
.block = "git/version"
.x = 514
.y = 700
link = "/git"
slot[] = "slot_footer:name"
slot_weight = "60"


; vim:filetype=dosini:
