<?php

/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),
    'meta' => [
        'defaults' => [
            'title' => 'Al Barokah Construction - Membangun Masa Depan Bersama',
            'titleBefore' => false,
            'description' => 'PT Konstruksi Bangun Sejahtera adalah perusahaan konstruksi terpercaya dengan pengalaman 25+ tahun. Spesialis pembangunan gedung, jalan, jembatan, dan infrastruktur sipil.',
            'separator' => ' | ',
            'keywords' => ['konstruksi', 'kontraktor', 'pembangunan gedung', 'infrastruktur', 'jalan tol', 'al barokah'],
            'canonical' => null,
            'robots' => 'index,follow',
        ],

        'webmaster_tags' => [
            'google' => null,
            'bing' => null,
            'alexa' => null,
            'pinterest' => null,
            'yandex' => null,
            'norton' => null,
        ],
    ],
    'opengraph' => [
        'defaults' => [
            'title' => 'Al Barokah Construction',
            'description' => 'Perusahaan konstruksi terpercaya dengan pengalaman 25+ tahun',
            'url' => null,
            'type' => 'website',
            'site_name' => 'Al Barokah Construction',
            'images' => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            // 'card'        => 'summary',
            // 'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title' => 'Over 9000 Thousand!', // set false to total remove
            'description' => 'For those who helped create the Genki Dama', // set false to total remove
            'url' => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type' => 'WebPage',
            'images' => [],
        ],
    ],
];
