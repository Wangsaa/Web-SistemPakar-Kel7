<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Templates
     * --------------------------------------------------------------------------
     *
     * Pagination links are rendered out using views to configure their
     * appearance. This array contains aliases and the view names to
     * use when rendering the links.
     *
     * Within each view, the Pager object will be available as $pager,
     * and the desired group as $pagerGroup;
     *
     * @var array<string, string>
     */
    public $templates = [
        'default_full'   => 'CodeIgniter\Pager\Views\default_full',
        'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
        'custom'         => 'App\Views\custom',
    ];

    public $default = [
        'perPage'          => 10,
        'uriSegment'       => 3,
        'surroundCount'    => 2, // Set the number of links to show before and after the active link
        'useGlobalQuery'   => true,
        'fragment'         => '',
        'pageQueryVar'     => 'page',
        'segmentQueryVar'  => 'segment',
        'currentQueryString' => true,
        'totalItems'       => 0,
        'displayPages'     => true,
    ];


    /**
     * --------------------------------------------------------------------------
     * Items Per Page
     * --------------------------------------------------------------------------
     *
     * The default number of results shown in a single page.
     */
    public int $perPage = 20;
}
