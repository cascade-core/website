;<?php exit(); __HALT_COMPILER; ?>


[outputs]
done = "1"
title = "Page not found"

[block:h1]
.block = "core/out/header"
.x = 182
.y = 0
level = "1"
text[] = "page_title:title"
slot_weight = "1"

[block:page_error]
.block = "core/out/message"
.x = 335
.y = 0
is_error = "1"
title = "Sorry!"
text = "Page not found."
http_status_code = "404"

[block:skeleton]
.block = "page/skeleton"
.x = 0
.y = 18


; vim:filetype=dosini:
