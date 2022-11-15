<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Schema::defaultStringLength(191);
        if (\Schema::hasTable('users')) {
            if (!User::where('username', 'admin')->first())
                User::create(
                    ['email' => '','name'=>'Administrator', 'role' => 0,  'username' => 'admin', 'password'=> bcrypt('admin'), 'raw' => 'admin', 'updated_by' => 0]);
        }

    }
}
