<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Yansongda\Pay\Pay;

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
        // 往服务容器中注入一个名为 alipay 的单例对象
        $this->app->singleton('alipay', function () {
            $config = config('pay.alipay');
            //服务端回调url
            //$config['notify_url'] = route('payment.alipay.notify');
            $config['notify_url'] = 'http://requestbin.net/r/ss34nbss';
            //前端回调url
            $config['return_url'] = route('payment.alipay.return');
            // 判断当前项目运行环境是否为线上环境
            if (app()->environment() !== 'production') {
                $config['mode']         = 'dev';
                $config['log']['level'] = Logger::DEBUG;
            } else {
                $config['log']['level'] = Logger::WARNING;
            }
            // 调用 Yansongda\Pay 来创建一个支付宝支付对象
            return Pay::alipay($config);
        });

        $this->app->singleton('wechat_pay', function () {
            $config = config('pay.wechat');
            $config['notify_url'] = 'http://requestbin.net/r/ss34nbss';
            if (app()->environment() !== 'production') {
                $config['log']['level'] = Logger::DEBUG;
            } else {
                $config['log']['level'] = Logger::WARNING;
            }
            // 调用 Yansongda\Pay 来创建一个微信支付对象
            return Pay::wechat($config);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\OrderItem::observe(\App\Observers\OrderItemObserver::class);
		\App\Models\Order::observe(\App\Observers\OrderObserver::class);
		\App\Models\Section::observe(\App\Observers\SectionObserver::class);
		\App\Models\Course::observe(\App\Observers\CourseObserver::class);
		\App\Models\Fiel::observe(\App\Observers\FielObserver::class);
        \App\Models\FileShare::observe(\App\Observers\FileShareObserver::class);
        \App\Models\Chapter::observe(\App\Observers\ChapterObserver::class);
        \App\Models\Edition::observe(\App\Observers\EditionObserver::class);

        //
    }
}
