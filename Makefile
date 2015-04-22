DEST=
PREFIX=$(DEST)/usr/local
ETC_DIR=$(PREFIX)/etc
REAL_ETC_DIR=$(DEST)/etc

.PHONY: install
install: $(ETC_DIR)/asf/conf.sh $(DEST)/var/log/local \
  $(PREFIX)/sbin/asf_learn $(PREFIX)/sbin/asf_cleanup \
  $(REAL_ETC_DIR)/cron.d/local_asf

# --compare and --preserve-timestamps are mutually exclusive
$(ETC_DIR)/asf/conf.sh: conf.sh | $(ETC_DIR)/asf
	install --compare --backup -m 644 $^ $@ 
	@echo "Don't forget to update $@"

$(ETC_DIR)/asf $(DEST)/var/log/local:
	mkdir -p $@

# -- implicit rules --
$(PREFIX)/sbin/%: %
	install -p '$<' '$@'

$(REAL_ETC_DIR)/cron.d/local_asf: asf.cron
	install -p -m 644 '$<' '$@'
	@echo "Don't forget to update USERS in $@"
