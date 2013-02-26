; <?php exit(); __halt_compiler(); ?>
; 
; Core fallback config file
;
;  - Copy this file to app/ directory and modify as you need.
;  - This is standard INI file (like php.ini).
;  - Sections named "[block:???]" represents starting set of blocks,
;    where "???" is block ID. In these sections:
;  	- Key ".block" is required; specifies block name (ie. "core/output").
;  	- Key ".force-exec" is optional; if true, block is
;  	  executed even if dependencies don't require that.
;  	- All other keys define block's inputs. Scalar constants are
;  	  specified as usual; connections are written like arrays:
;  	  	input[] = "source-block:output"
;  - All unknown options and sections are ignored, but can be used in
;    future versions.
;

; php.ini options here
[php]
log_errors		= true
html_errors		= false
display_errors		= false
error_reporting		= E_ALL
ignore_repeated_errors	= true

; core configuration
[core]
default_locale		= "en_GB"
;context_class		= Context
;app_init_file		= app/init.php
;fix_lighttpd_get	= true

; debug tools
[debug]
debug_logging_enabled	= true
always_log_banner	= true
log_memory_usage	= true
add_cascade_graph	= true
animate_cascade		= false
cascade_graph_file	= "{DIR_ROOT}data/graphviz/cascade-{hash}.{ext}"
cascade_graph_url	= "/data/graphviz/cascade-{hash}.{ext}"
cascade_graph_doc_link	= "/documentation/block/{block}"
profiler_stats_file	= "var/profiler.stats"

; default output configuration
[output]
default_type		= "html5"

; constants set by define(strtoupper(key), value)
[define]
; key			= value

; block replacement table
[block-map]
;old-block/name	= "replacement-block/name"

; list of enabled block storages (class names)
[block-storage]
ClassBlockStorage	= true
IniBlockStorage		= true

;
; starting blocks
;

;; You probably want to use something like this:
;
; [block:router]
; .block	= core/ini/router
; config	= app/routes.ini.php
;
;; ... instead of these two:

;[block:load_routes]
;.block		= core/ini/load
;filename	= routes.examples.ini.php
;scan_plugins	= true

[block:config]
.block		= core/json/config_loader

[block:router]
.block		= core/router
routes[]	= config:routes

[block:main]
.block		= "core/value/block_loader"
block[]		= "router:block"
block_fmt[]	= "router:block_fmt"
connections[]	= "router:connections"
output_forward	= "done,title,type"
enable[]	= "router:done"

[block:skeleton]
.block		= "page/skeleton"
enable[]	= ":and"
enable[]	= "router:skeleton"
enable[]	= "main:done"

[block:error_page]
.block		= page/error
enable[]	= :not
enable[]	= main:done

[block:page_title]
.block		= core/out/set_page_title
title[]		= :or
title[]		= main:title
title[]		= router:title
format[]	= router:title_fmt
enable[]	= main:done

[block:page_type]
.block		= core/out/set_type
type[]		= :or
type[]		= main:type
type[]		= router:type
enable[]	= main:done

;[block:extra]
;.block		= "core/value/cascade_loader"
;output_forward	= "done"
;extra[]	= "router:extra"
;enable[]	= "main:done"



; vim:filetype=dosini:

