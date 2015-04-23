<?php
$backends['imap']['disabled'] = true;

$backends['sieve']['disabled'] = false;
//# $backends['sieve']['transport'][Ingo::RULE_ALL]['params']['hostspec'] = 'sieve.example.com';
$backends['sieve']['transport'][Ingo::RULE_ALL] = array(
            'driver' => 'vfs',
            'params' => array(
                // Hostname of the VFS server
                'hostspec' => 'localhost',
                // Name of the procmail config file to write
                'filename' => '.dovecot.sieve',

                // VFS: FTP example
                // The VFS driver to use
                'vfstype' => 'ftp',
                // Port of the VFS server
                'port' => 21,
            )
        );
$backends['sieve']['script'][Ingo::RULE_ALL]['params']['utf8'] = true;

