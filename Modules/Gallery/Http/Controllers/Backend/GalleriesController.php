<?php

namespace Modules\Gallery\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class GalleriesController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Galleries';

        // module name
        $this->module_name = 'galleries';

        // directory path of the module
        $this->module_path = 'gallery::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Gallery\Models\Gallery";
    }

}
