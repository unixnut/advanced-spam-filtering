DEST=/
PREFIX=$(DEST)/usr/local
ETC_DIR=$(PREFIX)/etc

.PHONY: install
install: $(ETC_DIR)/asf/conf.sh $(DEST)/var/log/local $(PREFIX)/sbin/asf_learn $(PREFIX)/sbin/asf_cleanup

$(ETC_DIR)/asf/conf.sh: conf.sh | $(ETC_DIR)/asf
	install --compare --backup -m 644 -p $^ $@ 

$(ETC_DIR)/asf $(DEST)/var/log/local:
	mkdir -p $@

# -- implicit rules --
$(PREFIX)/sbin/%: %
	install -p '$<' '$@'

