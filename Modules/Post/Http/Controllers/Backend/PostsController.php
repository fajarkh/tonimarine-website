<?php

namespace Modules\Post\Http\Controllers\Backend;

use Nasirkhan\ModuleManager\Modules\Post\Http\Controllers\Backend\PostsController as VendorPostsController;

class PostsController extends VendorPostsController
{
    public function __construct()
    {
        parent::__construct();

        $this->module_model = 'Modules\\Post\\Models\\Post';
    }
}
