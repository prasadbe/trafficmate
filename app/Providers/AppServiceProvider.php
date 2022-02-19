<?php

namespace App\Providers;
use App\Service\CloudWatchLogger;
use App\Service\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('cloudwatch', function ($app) {
            return new CloudWatchLogger(new Setting([
                'credentials' => [
                    'key' => Config('app.AWS_ACCESS_KEY'),
                    'secret' => Config('app.AWS_SECRET_KEY'),
                    'region' => Config('app.AWS_REGION')
                ],
                'version' => 'latest',
                'region' => Config('app.AWS_REGION')
            ]));
        });
    }
}
