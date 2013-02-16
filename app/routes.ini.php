; <?php exit(); ?>

; Enable block scan -- All INI file sections with "route:" prefix,
; will be included to this configuratoin, sorted by length (desc).
[scan-blocks]
block_var = "content"
cache_file = "{DIR_ROOT}var/router.cache"

; default values
[#]
skeleton = true
content = false
extra = false
title_fmt = %s - Cascade
title = "(missing title)"
type = html5

;----------------------------------------------------------

[/admin]
content = "admin/main"
skeleton = false
extra = false
title = "Administration"
type = html5

[/admin/**]
content = "admin/main"
skeleton = false
extra = false
title = "Administration"
type = html5

;----------------------------------------------------------

[/documentation]
;content = "page/documentation_index"
content = "core/page/doc"
extra[] = "page/sidebar/text"
title = "Documentation Index"

[/documentation/block/**]
;content = "page/documentation"
content = "core/page/doc_show"
title = "Documentation"

;----------------------------------------------------------
; vim:filetype=dosini:

