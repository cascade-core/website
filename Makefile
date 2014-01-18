doc:
	make -C core  doc
	for p in plugin/*/ ; do [ -f "$$p/Makefile" ] && make -C "$$p" doc ; done

.PHONY: doc

