<?php

namespace Dot\Pages;

use Gate;
use Navigation;
use URL;

class Pages extends \Dot\Platform\Plugin
{

    protected $permissions = [
        "manage"
    ];

    function boot()
    {

        parent::boot();

        Navigation::menu("sidebar", function ($menu) {
            if (Gate::allows("pages.manage")) {
                $menu->item('pages', trans("admin::common.pages"), URL::to(ADMIN . '/pages'))
                    ->order(5.5)
                    ->icon("fa-file-text-o");
            }
        });
    }
}
