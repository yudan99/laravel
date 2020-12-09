<?php

return [
    'alipay' => [
        'app_id'         => '2021000116664829',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2h/8wKRpIaL6+NCJ06kFlQYFOU/B2uKW4v8JbD7WxQMeaNANzVdXlR8SoJ38RVWd/0BZUaTRtC8riXPslykH4uMTfP1j1/ZxWjkSfFJchonfSqlGIbd/Qx03xEuOYG5RkQs3HKJST650Z2Ef1WNJuSM3I8RiA80vgIvPeQtn8wWvpqXkUksWuDhHhs2d7CTEBrvEHdzT9pXBYB1IKgYOl+MXM+kEh622iNSjdUOXFXGsg3y6keniSHOj9Y5qluNA4WTsyUJ3F59+XWZ1i4qDJPpeS+y7bpji3KOOhmapDwTse808yDnKGJrcOndoFUqJRUAOlKHSMl7Tc923Fdv3gwIDAQAB',
        'private_key'    => 'MIIEowIBAAKCAQEAwe1TMKvDhXKdYDUI9Hknx4xxgWbN7R8K5vbe03KNLF6mdu3piNfHdTGdFKjKINsuh6mcHpQz2L1x8ba2/96pRzRZLBhylUXrTfUgLDx/aXGuOZvnYeX1BxUxq2H1+nf5RXXtzVd80F2ukCuieHE02BwIjaVhxuZUmrGfgJ0IlaYVPa5LrY0+oUl8Ng4eVmubRlH6BGV7FWBeV4HxU718ZUDkqo7vL7VxPWwPptLTr3yWT6ijTqJh9QcwfJp5a9QtaxeyCKqpavL6fiakGO+hdp28n2gseV35AMu+uPOes0n7giKiLRYqozBJShW9QglpFajLniN/UVdDeTlsZw6nGwIDAQABAoIBABlY4cS8zqOEpZlLlU4O/+oPK07UlxnlMtGZduqAUH96J5vn4NxoB8QDphprLXA59cz5mFRO3q/3owsK7MRo4AtUhktDLsbgCq932KqvhZ/Mog8Zl5auLeatGH7kIPiJ8eToUxrB0qiRdh2V9nhzo4qTr3KEKVGMDYbirIxs+hBFGIOnLnnsOH0tZUOeqVkbmTJtOkJ4Rk9SWzHBWMSazT2SWpNZTBG0euzY/IengtmDU3vxJrNmKOG/WlopnUiV0yoYcU/+VLdspZmUlQ/KVnrmxD8u4QvSMHgmwf+1PeRpsWL9m9Kt/T4OwfEfff+/FWKwFj0lK1OdyOoP/t9D+hECgYEA9PSAxr4pfyXFuFxuOFIkhwYVY3zhUCJrgJIcykC+S+PLPxArWm/x3dNQcl3V3Gqso1bNF2JjA2xYxakzKApuYCGnxUefFaybo5TYPex9Sx4yLtt7iyjMOu3uLCmXAq0HU75XgAHIKb4gS+GV2vD2LX24hMZI9RIhtnblipLFT28CgYEAyqvPMkxfbqFLJgYYuhd+5XMHjOpNVZP1zqVIJeFW/3tvToZ9LjYnfpMNxB4C7Y4lc65saahSXjziak1lx8f93gZyCNVgyiSCWBmYjlQnE8h0L6/eCgNO2Y7p8M4k6ifdOsgROIPU2YEQtQdjZkEkxY1f9h2BOk8x1ELLKFJRjRUCgYEA7s90wM3iPPCBW+TZHBWRQQZAUfcM3wg/kGBiqxgFro0NuJS1/3yF7AK5OlabSkHBv5i/aF3mNA8sWMBFfHL2+se0/dN+mC3oqslRLMXjvRlaSW53essymP0gJ3QAon44V3+JZOXX1EJk0DXE2Gf1SZJ5ExERTcP4lCBEVx4SOQcCgYA5dtl6s3jjj0wVbekY6oyKVkEvzUc8GoW5n9eDFg9qxP7cTvmzXpt4Ig3nK3M9E+6+jBglJRqlqbGw3l0bdjMe/sjahFW7OvrSK/+7a1ThIRcAZmcYg7OZsBHYuzpwQflSL2PimE6DlTq9eWjPl2zrrpgk2lzHwaipPH8J4b1JuQKBgAt1bo8epxLX/YQmdZ8Rj7OUZ35H8lPIsXrga0Zerpt7mXKPpmEBhwYfEpHyn9pZsH8kjXDYIjJuz7hAXv5RKWUa+I6gksWlTs1e5lLdPEOAoG28H2QlGchxg5yf+SBmj4otFAoifyr58qOnC5pi6VrGO5W8lAWI1ebYJizDPpVp',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
