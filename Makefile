DEST=
PREFIX=$(DEST)/usr/local
ETC_DIR=$(PREFIX)/etc
REAL_ETC_DIR=$(DEST)/etc

.PHONY: install install_sa
install: $(ETC_DIR)/asf/conf.sh $(DEST)/var/log/local \
  $(PREFIX)/sbin/asf_learn $(PREFIX)/sbin/asf_cleanup \
  $(REAL_ETC_DIR)/cron.d/local_asf

# --compare and --preserve-timestamps are mutually exclusive
$(ETC_DIR)/asf/conf.sh: conf.sh | $(ETC_DIR)/asf
	install --compare --backup -m 644 $^ $@ 
	@echo "Don't forget to update $@"

$(ETC_DIR)/asf $(DEST)/var/log/local:
	mkdir -p $@

$(REAL_ETC_DIR)/horde/ingo/backends.d/sieve.php: ingo/sieve.backend.php
	install --backup -m 644 $^ $@

$(REAL_ETC_DIR)/horde/ingo/prefs.d/local.php: ingo/local.prefs.php
	install --compare --backup -m 644 $^ $@
	@echo "Don't forget to change 'level' and 'folder' settings in $@"
	@echo "(see \$_prefs['spam'])"
	@sed -n "s/[[:space:]]*'value' => 'a:2:{.*;s:5:\"level\";i:\([0-9]*\).*/  ...'level' currently = \1/p" "$@"
	@sed -n "s/[[:space:]]*'value' => 'a:2:{s:6:\"folder\";s:[0-9]*:\"\([^\"]*\)\".*/  ...'folder' currently = \"\1\"/p" "$@"


# -- implicit rules --
$(PREFIX)/sbin/%: %
	install -p '$<' '$@'

$(REAL_ETC_DIR)/cron.d/local_asf: asf.cron
	install -p -m 644 '$<' '$@'
	@echo "Don't forget to update USERS in $@"


# -- packages --
# this commandis equivalent to:
#   aptitude install --without-recommends spamass-milter spamassassin
install_sa:
	apt-get -o 'Apt::Install-Recommends: no' install spamass-milter spamassassin
	@echo "Don't forget to update /etc/postfix/main.cf as per postfix/main.cf.snippet"
