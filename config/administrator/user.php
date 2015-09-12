<?php

/**
 * Teams model config.
 */

return [

    'title' => 'Users',

    'single' => 'user',

    'model' => 'Nhlpool\User',

    /*
     * The display columns
     */
    'columns' => [
        'id',
        'name' => [
            'title' => 'Name',
        ],
        'email' => [
            'title' => 'Email',
        ],
        'admin' => [
            'title' => 'Admin',
        ],
    ],

    /*
     * The filter set
     */
    'filters' => [
        'name' => [
            'title' => 'Name',
        ],
        'email' => [
            'title' => 'Email',
        ],
        'admin' => [
            'title' => 'Admin',
            'type'  => 'bool',
        ],
    ],

    /*
     * The editable fields
     */
    'edit_fields' => [
        'name' => [
            'title' => 'Name',
        ],
        'email' => [
            'title' => 'Email',
        ],
        'admin' => [
            'title' => 'Admin',
            'type'  => 'bool',
        ],
    ],

    'sort' => [
        'field'     => 'name',
        'direction' => 'asc',
    ],
];
