all: json

.PHONY: all clean png pdf


graphml = $(wildcard *.graphml)
json    = $(patsubst %.graphml,%.json.php,$(wildcard *.graphml))

json: $(json)

clean:
	rm -f $(json)

%.json.php: %.graphml Makefile
	./graphml2smalldb.php $< $@

