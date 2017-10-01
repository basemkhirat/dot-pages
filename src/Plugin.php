<?php

namespace Dot\Pages;

use Gate;
use Navigation;
use URL;

class Plugin extends \Dot\Platform\Plugin
{

    public $permissions = [
        "manage"
    ];

    function boot()
    {

        Navigation::menu("sidebar", function ($menu) {
            if (Gate::allows("pages.manage")) {
                $menu->item('pages', trans("admin::common.pages"), URL::to(ADMIN . '/pages'))
                    ->order(5.5)
                    ->icon("fa-file-text-o");
            }
        });

        include __DIR__ . "/routes.php";

    }
}
