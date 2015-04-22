#! /bin/sh
# setup.sh (Bourne shell script) -- Configure Dovecot for LDA with Sieve

apt-get install dovecot-sieve

dpkg-divert --rename /etc/dovecot/conf.d/15-lda.conf
install -m 644 15-lda.conf /etc/dovecot/conf.d/15-lda.conf

## dpkg-divert --rename /etc/dovecot/conf.d/90-sieve.conf.conf
## install -m 644 90-sieve.conf.conf /etc/dovecot/conf.d/90-sieve.conf.conf
