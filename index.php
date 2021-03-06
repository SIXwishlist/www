<?php
// index.php 20150101 - 20170305
// Copyright (C) 2015-2017 Mark Constable <markc@renta.net> (AGPL-3.0)

const DS  = DIRECTORY_SEPARATOR;
const INC = __DIR__ . DS . 'lib' . DS . 'php' . DS;

spl_autoload_register(function ($c) {
    $f = INC . str_replace(['\\', '_'], [DS, DS], strtolower($c)) . '.php';
    if (file_exists($f)) include $f;
    else error_log("!!! $f does not exist");
});

echo new Init(new class
{
    public
    $cfg = [
        'email' => 'markc@renta.net',
        'file'  => 'lib' . DS . '.ht_conf.php', // settings override
        'hash'  => 'SHA512-CRYPT',
        'perp'  => 25,
        'self'  => '',
    ],
    $in = [
        'd'     => '',          // Domain (current)
        'g'     => null,        // Group/Category
        'i'     => null,        // Item or ID
        'l'     => '',          // Log (message)
        'm'     => 'list',      // Method (action)
        'o'     => 'home',      // Object (content)
        't'     => 'bootstrap', // Theme
        'x'     => '',          // XHR (request)
        'search'=> '',
        'sort'  => '',
        'order' => 'desc',
        'offset'=> '0',
        'limit' => '10',
    ],
    $out = [
        'doc'   => 'NetServa',
        'css'   => '',
        'log'   => '',
        'nav1'  => '',
        'nav2'  => '',
        'nav3'  => '',
        'head'  => 'NetServa',
        'main'  => 'Error: missing page!',
        'foot'  => 'Copyright (C) 2015-2017 Mark Constable (AGPL-3.0)',
        'js'   => '',
        'end'   => '',
    ],
    $db = [
        'host'  => '127.0.0.1', // DB site
        'name'  => 'sysadm',    // DB name
        'pass'  => 'lib' . DS . '.ht_pw', // MySQL password override
        'path'  => '/var/lib/sqlite/sysadm/sysadm.db', // SQLite DB
        'port'  => '3306',      // DB port
        'sock'  => '',          // '/run/mysqld/mysqld.sock',
        'type'  => 'sqlite',    // mysql | sqlite
        'user'  => 'sysadm',    // DB user
    ],
    $nav1 = [
        'non' => [
            ['About',       '?o=about', 'fas fa-info-circle fa-fw'],
            ['Contact',     '?o=contact', 'fas fa-envelope fa-fw'],
            ['News',        '?o=news&p=1', 'fas fa-newspaper fa-fw'],
            ['Sign in',     '?o=auth', 'fas fa-sign-in-alt fa-fw'],
        ],
        'usr' => [
            ['News',        '?o=news&p=1', 'fas fa-newspaper fa-fw'],
        ],
        'adm' => [
            ['News',        '?o=news&p=1', 'fas fa-newspaper fa-fw'],
            ['Admin',       [
                ['Accounts',    '?o=accounts&p=1', 'fas fa-vcard fa-fw'],
                ['Vhosts',      '?o=vhosts&p=1', 'fas fa-globe fa-fw'],
                ['Vmails',      '?o=vmails&p=1', 'fas fa-envelope fa-fw'],
                ['Aliases',     '?o=valias&p=1', 'fas fa-envelope-square fa-fw'],
                ['Domains',     '?o=domains&p=1', 'fas fa-server fa-fw'],
            ], 'fas fa-users fa-fw'],
            ['Stats',       [
                ['Sys Info',    '?o=infosys&p=1', 'fas fa-dashboard fa-fw'],
                ['Mail Info',    '?o=infomail&p=1', 'fas fa-envelope-o fa-fw'],
                ['Mail Graph',    '?o=mailgraph&p=1', 'fas fa-envelope fa-fw'],
            ], 'fas fa-info-circle fa-fw'],
        ],
    ],
    $nav2 = [
    ],
    $dns = [
        'a'     => '127.0.0.1',
        'mx'    => '',
        'ns1'   => 'ns1.',
        'ns2'   => 'ns2.',
        'prio'  => 0,
        'ttl'   => 300,
        'soa'   => [
            'primary' => 'ns1.',
            'email'   => 'admin.',
            'refresh' => 7200,
            'retry'   => 540,
            'expire'  => 604800,
            'ttl'     => 3600,
        ],
        'db' => [
            'host'  => '127.0.0.1', // Alt DNS DB site
            'name'  => 'pdns',      // Alt DNS DB name
            'pass'  => 'lib' . DS . '.ht_dns_pw', // MySQL DNS password override
            'path'  => '/var/lib/sqlite/sysadm/pdns.db', // DNS SQLite DB
            'port'  => '3306',      // Alt DNS DB port
            'sock'  => '',          // '/run/mysqld/mysqld.sock',
            'type'  => '',          // mysql | sqlite | '' to disable
            'user'  => 'pdns',      // Alt DNS DB user
        ],
    ],
    $acl = [
        0 => 'SuperAdmin',
        1 => 'Administrator',
        2 => 'User',
        3 => 'Suspended',
        9 => 'Anonymous',
    ];
});

?>
