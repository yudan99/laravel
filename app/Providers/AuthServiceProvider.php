<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
		 \App\Models\CouponCode::class => \App\Policies\CouponCodePolicy::class,
		 \App\Models\OrderItem::class => \App\Policies\OrderItemPolicy::class,
		 \App\Models\Order::class => \App\Policies\OrderPolicy::class,
		 \App\Models\Section::class => \App\Policies\SectionPolicy::class,
		 \App\Models\Course::class => \App\Policies\CoursePolicy::class,
		 \App\Models\Fiel::class => \App\Policies\FielPolicy::class,
		 \App\Models\FileShare::class => \App\Policies\FileSharePolicy::class,
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // 修改策略自动发现的逻辑
        Gate::guessPolicyNamesUsing(function ($modelClass) {
            // 动态返回模型对应的策略名称，如：// 'App\Model\User' => 'App\Policies\UserPolicy',
            return 'App\Policies\\'.class_basename($modelClass).'Policy';
        });

        //
    }
}
