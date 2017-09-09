<?php
return [
  'default_tag' => [
    'name' => 'Untagged',
    'slug' => 'untagged',
    'id' => 1,
  ],
  'default_category' => [
    'title' => 'Uncategorized',
    'slug' => 'uncategozied',
    'id' => 1,
  ],
  'default_project_category' => [
    'title' => 'Projekt',
    'slug' => 'projekt',
    'id' => 2,
  ],
  'users_default' => [
    'name' => 'Uncategorized',
    'slug' => 'uncategozied',
    'id' => 1,
  ],
  'image' => [
    'news' => [
      'directory' => 'images/news',
      'width' => 500,
      'height' => 340,
      'thumbnail' => [
        'width' => 250,
        'height' => 170
      ]
    ],
    'lfmSettings' => [
      'thumbs' => [
        /* LIKE POPULAR POST LIST IN SIDEBAR 64x44 */
        'small' => [
          'extPref' => 'thumb_s',
          'width' => '64',
          'height' => '64'
        ],
        /* LIKE NEWSLIST  310x214 */
        'medium' => [
          'extPref' => 'thumb_m',
          'width' => '310',
          'height' => '214'
        ],
        /* LIKE NEWS POST HEADER */
        'large' => [
          'extPref' => 'thumb_l',
          'width' => '700',
          'height' => '482'
        ],
      ]
    ],

    'events' => [
      'directory' => 'images/events',
      'width' => 500,
      'height' => 340,
      'thumbnail' => [
        'width' => 250,
        'height' => 170
      ]
    ],
    'google' => [
      /*
      |--------------------------------------------------------------------------
      | Client ID
      |--------------------------------------------------------------------------
      |
      | The Client ID can be found in the OAuth Credentials under Service Account
      |
      */
      'client_id' => '117196289637951485763',

      /*
      |--------------------------------------------------------------------------
      | Service account name
      |--------------------------------------------------------------------------
      |
      | The Service account name is the Email Address that can be found in the
      | OAuth Credentials under Service Account
      |
      */
      'service_account_name' => 'kodvetokservice@inlaid-marker-178817.iam.gserviceaccount.com',

      /*
      |--------------------------------------------------------------------------
      | Key file location
      |--------------------------------------------------------------------------
      |
      | This is the location of the .p12 file from the Laravel root directory
      |
      */
      'key_file_location' => '/public/MyProject-7847c546ef6a.json',
    ]

  ]
];
