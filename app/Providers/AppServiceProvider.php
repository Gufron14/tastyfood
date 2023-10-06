<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Contracts\View\View;
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
        view()->composer('admin.layout.topbar', function ($view) {
            $messages = Message::orderBy('created_at', 'desc')->limit(4)->get();
            $view->with('messages', $messages);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.layout.topbar', function ($view) {
            $totalMessage = Message::count();
            $view->with('totalMessage', $totalMessage);
        });
    }
}
