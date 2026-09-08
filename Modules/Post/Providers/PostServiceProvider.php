<?php

namespace Modules\Post\Providers;

use Nasirkhan\ModuleManager\Modules\Post\Providers\PostServiceProvider as VendorPostServiceProvider;

class PostServiceProvider extends VendorPostServiceProvider
{
    public function boot(): void
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadRoutesFrom(base_path('Modules/Post/routes/web.php'));
        $this->loadMigrationsFrom(base_path('vendor/nasirkhan/module-manager/src/Modules/Post/database/migrations'));
        $this->registerCommands('Nasirkhan\\ModuleManager\\Modules\\Post\\Console\\Commands');
        $this->registerSeeders();
        $this->registerLivewireComponents();
    }

    public function registerViews(): void
    {
        parent::registerViews();

        $this->loadViewsFrom(base_path('Modules/Post/Resources/views'), 'post');
    }
}
