<?php

namespace Dot\Pages;

use Illuminate\Support\Facades\Auth;
use Dot\Platform\Facades\Navigation;

class Pages extends \Dot\Platform\Plugin
{

    /*
     * @var array
     */
    protected $dependencies = [
        "tags" => \Dot\Tags\Tags::class
    ];

    protected $permissions = [
        "manage"
    ];

    function boot()
    {

        parent::boot();

        Navigation::menu("sidebar", function ($menu) {

            if (Auth::user()->can("pages.manage")) {
                $menu->item('pages', trans("admin::common.pages"), route("admin.pages.show"))
                    ->order(5.5)
                    ->icon("fa-file-text-o");
            }
        });
    }
}
