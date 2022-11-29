<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Role;
use App\Policies\CategoryPolicy;
use App\Policies\CommentPolicy;
use App\Policies\OrderPolicy;
use App\Policies\OrderdetailPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\PermissionPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Category::class => CategoryPolicy::class,
        Product::class => ProductPolicy::class,
        Order::class => OrderPolicy::class,
        Orderdetail::class => Orderdetail::class,
        News::class => ProductPolicy::class,
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        Comment::class => CommentPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('Category_list', 'App\Policies\CategoryPolicy@view');
        Gate::define('Category_add', 'App\Policies\CategoryPolicy@create');
        Gate::define('Category_update', 'App\Policies\CategoryPolicy@update');
        Gate::define('Category_delete', 'App\Policies\CategoryPolicy@delete');

        Gate::define('Product_list', 'App\Policies\ProductPolicy@view');
        Gate::define('Product_add', 'App\Policies\ProductPolicy@create');
        Gate::define('Product_update', 'App\Policies\ProductPolicy@update');
        Gate::define('Product_delete', 'App\Policies\ProductPolicy@delete');

        Gate::define('Order_list', 'App\Policies\OrderPolicy@view');
        Gate::define('Order_update', 'App\Policies\OrderPolicy@update');
        Gate::define('Order_delete', 'App\Policies\OrderPolicy@delete');

        Gate::define('Orderdetail_list', 'App\Policies\OrderdetailPolicy@view');
        Gate::define('Orderdetail_delete', 'App\Policies\OrderdetailPolicy@delete');

        Gate::define('News_list', 'App\Policies\NewsPolicy@view');
        Gate::define('News_add', 'App\Policies\NewsPolicy@create');
        Gate::define('News_update', 'App\Policies\NewsPolicy@update');
        Gate::define('News_delete', 'App\Policies\NewsPolicy@delete');

        Gate::define('List role_list', 'App\Policies\RolePolicy@view');
        Gate::define('List role_add', 'App\Policies\RolePolicy@create');
        Gate::define('List role_update', 'App\Policies\RolePolicy@update');
        Gate::define('List role_delete', 'App\Policies\RolePolicy@delete');

        Gate::define('User_list', 'App\Policies\UserPolicy@view');
        Gate::define('User_add', 'App\Policies\UserPolicy@create');
        Gate::define('User_update', 'App\Policies\UserPolicy@update');
        Gate::define('User_delete', 'App\Policies\UserPolicy@delete');

        Gate::define('comment_list', 'App\Policies\CommentPolicy@view');
        Gate::define('comment_delete', 'App\Policies\CommentPolicy@delete');

        Gate::define('Permission_add', 'App\Policies\PermissionPolicy@create');
    }
}
