<?php


namespace HamidRoohani\ForwardToUrl;


use HamidRoohani\ForwardToUrl\Facades\ResponderFacade;
use HamidRoohani\ForwardToUrl\Facades\SaveDBFacade;
use HamidRoohani\ForwardToUrl\Facades\ValidateRequesterFacade;
use HamidRoohani\ForwardToUrl\Http\Responses\UrlResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ForwardToUrlServiceProvider extends ServiceProvider
{
    private $namespace = "HamidRoohani\ForwardToUrl\Http\Controllers";

    public function register()
    {
        ValidateRequesterFacade::shouldProxyTo(ValidateRequester::class);
        ResponderFacade::shouldProxyTo(UrlResponse::class);
        SaveDBFacade::shouldProxyTo(SaveDB::class);
    }

    public function boot()
    {
        $this->defineRoutes();
        $this->defineLogs();
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    public function defineLogs(){
        $this->app->make('config')->set('logging.channels.daily-forward-url-sms', [
            'driver' => 'daily',
            'path' => storage_path('logs/forward-url-sms.log'),
            'level' => 'debug',
            'days' => 14,
        ]);
    }
    public function defineRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/routes.php');
    }
}
