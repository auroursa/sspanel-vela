<?php

/**
 * default 为默认配置，你可以添加其他配置，但必须保证默认配置存在
 *
 * Checks 填写为没有直接在规则文件中使用的并且使用了筛选规则且组内或可能无节点的策略组名
 *  - 例如使用 regex 分类国家分组，未匹配时组内无节点，此类需要填入 Checks 中以保证配置文件无误
 *
 * Surge 以及 Surfboard 的 General 中，布尔值请填写为字符串
 *
 * Surge 以及 Surfboard 的 Proxy 中，请填写为该应用的格式
 * Clash 的 Proxy 中，请填写为数组
 */

/**
 * Surge 配置文件定义
 */
$_ENV['Surge_Profiles'] = [
    'default' => [
        'Checks' => [],
        'General' => [
            'loglevel'                    => 'notify',
            'dns-server'                  => 'system, 119.29.29.29, 1.1.1.1',
            'skip-proxy'                  => '127.0.0.1, 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12, 100.64.0.0/10, 17.0.0.0/8, localhost, *.local, *.crashlytics.com',
            'enhanced-mode-by-rule'       => 'false',
            'exclude-simple-hostnames'    => 'true',
            'show-error-page-for-reject'  => 'true',
            'ipv6'                        => 'true',
            'replica'                     => 'false',
        ],
        'Proxy' => [
            '直接连接 = DIRECT'
        ],
        'ProxyGroup' => [
            [
                'name' => '境外流量',
                'type' => 'select',
                'content' => [
                    'right-proxies' => [
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Microsoft',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ]
                ]
            ],
            [
                'name' => 'Cygames',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'DMM',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'GPT',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Steam_API',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量',
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Steam_CDN',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Apple_API',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Apple_CDN',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ]
                ]
            ],
            [
                'name' => 'Telegram',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '雀魂麻将',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Netflix',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '巴哈姆特',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'YouTube',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'bilibili',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '境外其他流媒体',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '星野集团',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量',
                        '直接连接'
                    ]
                ]
            ],
            [
                'name' => '其他流量',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量',
                        '直接连接'
                    ]
                ]
            ]
        ],
        'Rule' => [
            'source' => 'surge/default.tpl'
        ]
    ]
];

/**
 * Surge 2.x 版本的配置文件定义
 */
$_ENV['Surge2_Profiles'] = [
    'default' => [
        'Checks' => [],
        'General' => [
            'loglevel'                   => 'notify',
            'ipv6'                       => 'true',
            'replica'                    => 'false',
            'dns-server'                 => 'system, 119.29.29.29, 1.1.1.1',
            'skip-proxy'                 => '127.0.0.1, 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12, 100.64.0.0/10, 17.0.0.0/8, localhost, *.local, *.crashlytics.com',
            'bypass-system'              => 'true',
            'allow-wifi-access'          => 'false',
        ],
        'Proxy' => [
            '直接连接 = DIRECT'
        ],
        'ProxyGroup' => [
            [
                'name' => '境外流量',
                'type' => 'select',
                'content' => [
                    'right-proxies' => [
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Microsoft',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ]
                ]
            ],
            [
                'name' => 'Cygames',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'DMM',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'GPT',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Steam_API',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量',
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Steam_CDN',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Apple_API',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Apple_CDN',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ]
                ]
            ],
            [
                'name' => 'Telegram',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '雀魂麻将',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Netflix',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '巴哈姆特',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'YouTube',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'bilibili',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '境外其他流媒体',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '星野集团',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量',
                        '直接连接'
                    ]
                ]
            ],
            [
                'name' => '其他流量',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量',
                        '直接连接'
                    ]
                ]
            ]
        ],
        'Rule' => [
            'source' => 'surge2/default.tpl'
        ]
    ]
];

/**
 * Clash 配置文件定义
 */
$_ENV['Clash_Profiles'] = [
    'default' => [
        'Checks' => [],
        'General' => [
            'port'                => 7890,
            'socks-port'          => 7891,
            'redir-port'          => 7892,
            'allow-lan'           => false,
            'mode'                => 'rule',
            'log-level'           => 'silent',
            'external-controller' => '127.0.0.1:19198',
            'secret'              => ''
        ],
        'DNS' => [
            'enable'              => true,
            'ipv6'                => false,
            'listen'              => '127.0.0.53:53',
            'enhanced-mode'       => 'fake-ip',
            'fake-ip-range'       => '198.18.0.1/16',
            'nameserver'=>[
                'https://doh.pub/dns-query',
                'https://1.1.1.1/dns-query'
            ],
            'fallback'=>[
                '114.114.114.114',
                '8.8.8.8'
            ],
            'fallback-filter'=>[
                'geoip'=> true,
                'ipcidr'=>[
                    '240.0.0.0/4'
                ]
            ]
        ],
        'Proxy' => [],
        'ProxyGroup' => [
            [
                'name' => '境外流量',
                'type' => 'select',
                'content' => [
                    'right-proxies' => [
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Microsoft',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ]
                ]
            ],
            [
                'name' => 'Cygames',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'DMM',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'GPT',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Steam_API',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量',
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Steam_CDN',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Apple_API',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Apple_CDN',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ]
                ]
            ],
            [
                'name' => 'Telegram',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '雀魂麻将',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Netflix',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '巴哈姆特',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'YouTube',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'bilibili',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '境外其他流媒体',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '星野集团',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量',
                        '直接连接'
                    ]
                ]
            ],
            [
                'name' => '其他流量',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量',
                        '直接连接'
                    ]
                ]
            ],
            [
                'name' => 'DN42',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '直接连接',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        'DIRECT'
                    ]
                ]
            ]
        ],
        'Rule' => [
            'source' => 'clash/default.tpl'
        ]
    ]
];

/**
 * Surfboard 配置文件定义
 */
$_ENV['Surfboard_Profiles'] = [
    'default' => [
        'Checks' => [],
        'General' => [
            'loglevel'   => 'notify',
            'doh-server' => 'https://doh.pub/dns-query, https://1.1.1.1/dns-query',
            'dns-server' => 'system, 119.29.29.29, 1.1.1.1',
            'skip-proxy' => '127.0.0.1, 192.168.0.0/16, 10.0.0.0/8, 172.16.0.0/12, 100.64.0.0/10, 17.0.0.0/8, localhost, *.local, *.crashlytics.com',
        ],
        'Proxy' => [],
        'ProxyGroup' => [
            [
                'name' => '境外流量',
                'type' => 'select',
                'content' => [
                    'right-proxies' => [
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Microsoft',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ]
                ]
            ],
            [
                'name' => 'Cygames',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'DMM',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'GPT',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Steam_API',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量',
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Steam_CDN',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Apple_API',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Apple_CDN',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接',
                        '境外流量'
                    ]
                ]
            ],
            [
                'name' => 'Telegram',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '雀魂麻将',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'Netflix',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '巴哈姆特',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'YouTube',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => 'bilibili',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '直接连接'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '境外其他流媒体',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量'
                    ],
                    'regex' => '(.*)',
                ]
            ],
            [
                'name' => '星野集团',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量',
                        '直接连接'
                    ]
                ]
            ],
            [
                'name' => '其他流量',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        '境外流量',
                        '直接连接'
                    ]
                ]
            ],
            [
                'name' => '直接连接',
                'type' => 'select',
                'content' => [
                    'left-proxies' => [
                        'DIRECT'
                    ]
                ]
            ]
        ],
        'Rule' => [
            'source' => 'surfboard/default.tpl'
        ]
    ]
];
