doc:
	make -C core  doc
	for p in plugin/*/ ; do [ -f "$$p/Makefile" ] && make -C "$$p" doc ; done

clean:
	make -C core  clean
	for p in plugin/*/ ; do [ -f "$$p/Makefile" ] && make -C "$$p" clean ; done

.PHONY: doc

