<?php

/**
 * Teams model config.
 */

return [

    'title' => 'Pools',

    'single' => 'Pool',

    'model' => 'Nhlpool\Pool',

    /*
     * The display columns
     */
    'columns' => [
        'id',
        'start_date' => [
            'title' => 'Start date',
        ],
        'end_date' => [
            'title' => 'End date',
        ],
        'pool_types' => [
            'title'        => 'Pool Type',
            'relationship' => 'pool_type',
            'select'       => "(:table).name",
        ],
    ],

    /*
     * The filter set
     */
    'filters' => [
        'start_date' => [
            'title' => 'Name',
        ],
        'end_date' => [
            'title' => 'Created By',
        ],
        'pool_types' => [
            'title'        => 'Pool Type',
        ],
    ],

    /*
     * The editable fields
     */
    'edit_fields' => [
        'start_date' => [
            'title' => 'Name',
        ],
        'end_date' => [
            'title' => 'Created By',
        ],
        'pool_types' => [
            'title'        => 'Pool Type',
        ],
    ],

    'sort' => [
        'field'     => 'id',
        'direction' => 'asc',
    ],
];
