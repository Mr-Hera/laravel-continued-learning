<?php

namespace App\Providers;

use App\Models\Channel;
use App\Mixins\StrMixins;
use Illuminate\Support\Str;
use App\PostcardSendingService;
use App\Billing\BankPaymentGateway;
use Illuminate\Support\Facades\View;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\ChannelsComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // register payment gateway service
        $this->app->singleton(PaymentGatewayContract::class, function($app) {

            if(request()->has('credit')) {
                return new CreditPaymentGateway('ksh');
            }
            
            return new BankPaymentGateway('ksh');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Option 1 - share a 'channels' variable with every single view
        // View::share('channels', Channel::orderBy('name')->get());

        // Option 2 - share a 'channels' variable with specified views
        // 'post.create' can also be expressed as a wildcard as in 'post.*' to mean all views under post
        // View::composer(['post.create', 'channel.index'], function($view) {
        //     $view->with('channels', Channel::orderBy('name')->get());
        // });

        // Option 3 - dedicated class
        View::composer(['post.*', 'channel.*'], ChannelsComposer::class);
        
        // register postcard sending service
        $this->app->singleton('Postcard', function($app) {
            return new PostcardSendingService('spain', 4, 6);
        });

        // adding a macro
        Str::macro('partNumber', function($part) {
            return 'ABC-' . substr($part, 0, 3) . '-' . substr($part, 3);
        });

        /* 
            adding a macro mixin with <false> attribute to ensure macros with similar 'method' as defined in the mixin 
            don't get overwritten by this one of the mixin
        */
        Str::mixin(new StrMixins(), false);

        ResponseFactory::macro('errorJson', function($message = 'Default error message') {
            return [
                'message' => $message,
                'error_code' => 123,
            ];
        });
    }
}
