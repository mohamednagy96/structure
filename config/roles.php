<?php

return [

    'roles' => [
        'admin',
    ],

    'permissions' => [
        /**
         * admin permissions
         */
        'Admin users' => [
            'admin_users_list',
            'admin_users_create',
            'admin_users_edit',
            'admin_users_delete',
        ],
        'Roles' => [
            'roles_list',
            'roles_create',
            'roles_edit',
            'roles_delete',
        ],
  
        'About us' => [
            'about_list',
            'about_create',
            'about_edit',
            'about_delete',
        ],
      
        'Contacts' => [
            'contacts_list',
            'contacts_create',
            'contacts_edit',
            'contacts_delete',
        ],

        'countries' => [
            'countries_list',
            'countries_create',
            'countries_edit',
            'countries_delete',
        ],
        'cities' => [
            'cities_list',
            'cities_create',
            'cities_edit',
            'cities_delete',
        ],
        'customers' => [
            'customers_list',
            'customers_create',
            'customers_edit',
            'customers_delete',
        ],
        'Settings' => [
            'settings_list',
            'settings_edit',
        ],
    ]

];
