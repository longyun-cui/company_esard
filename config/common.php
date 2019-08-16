<?php

    return [


        'host' => [

            'local' => [
                'root' => 'http://local-esard.com',
                'www' => 'http://www.local-esard.com',
                'cdn' => 'http://cdn.local-esard.com',

                'MailService' => 'http://mailserver.com',
            ],

            'online' => [
                'root' => 'http://longyun.trade',
                'www' => 'http://www.longyun.trade',
                'cdn' => 'http://cdn.longyun.trade',

                'MailService' => 'http://live2.pub:8088',
            ],

            'front' => [
                'prefix' => '',
                'root' => '',
                'index' => ''
            ],

            'admin' => [
                'prefix' => ''
            ],

        ],

        'MailService' => [
            'local' => 'http://mailserver.com',
            'online' => 'http://live2.pub:8088',
        ],


        'website' => [

            'front' => [
                'prefix' => '',
                'root' => '',
                'index' => ''
            ],

            'admin' => [
                'prefix' => ''
            ],

        ],


        'MailServiceLocal' => 'http://mailserver.com',
        'MailServiceOnline' => 'http://live2.pub:8088',


        'head_title' => '苏州怡赛德电梯科技股份有限公司',
        'meta_title' => '苏州怡赛德电梯科技股份有限公司',
        'meta_description' => '',
        'meta_keywords' => '',


    ];
