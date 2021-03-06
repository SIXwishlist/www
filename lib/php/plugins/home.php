<?php
// lib/php/plugins/home.php 20150101 - 20170317
// Copyright (C) 2015-2017 Mark Constable <markc@renta.net> (AGPL-3.0)

class Plugins_Home extends Plugin
{
    public function list() : string
    {
error_log(__METHOD__);

        $buf = '
      <h3>
        <i class="fa fa-server fa-fw"></i> NetServa
        <small>(Hosting Control Panel)</small>
      </h3>
      <p>
This is an ultra simple web based Hosting Control Panel for a lightweight
DNS, Mail and Web server based on Ubuntu Server (minimum Zesty 17.04). It
uses PowerDNS for DNS, Postfix/Dovecot + Spamprobe for SMTP and spam filtered
IMAP email hosting along with nginx + PHP7 FPM + LetsEncrypt SSL for efficient
and secure websites. It can use either SQLite or MySQL as database backends
and the SQLite version only requires <b>60Mb</b> of ram on a fresh install so
is ideal for LXD containers or 256Mb VPS plans. Some of the features are...
      </p>
      <ul>
        <li> <b>NetServa</b> does not reqire Python or Ruby, just PHP and Bash</li>
        <li> Fully functional DNS, Mail and Web server with Spam filtering</li>
        <li> Built from the ground up using Bootstrap 4 and jQuery 3</li>
      </ul>
      <p>
Comments and pull requests are most welcome via the Issue Tracker link below.
      </p>
      <p class="text-center">
        <a class="btn btn-primary" href="https://github.com/netserva/www">Project Page</a>
        <a class="btn btn-primary" href="https://github.com/netserva/www/issues">Issue Tracker</a>
      </p>';
        return $this->t->list(['buf' => $buf]);
    }
}

?>
