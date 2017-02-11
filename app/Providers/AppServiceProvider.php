<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Response;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    	/** @var \Illuminate\Http\Request $request */
        $request = $this->app->make('request');
        if ($request->isMethod('options')) {
            return $this->setCorsHeaders(new Response('OK', 200));
        }
    }
}