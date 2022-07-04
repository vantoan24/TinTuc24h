<?php

namespace App\Providers;


use App\Repositories\Eloquent\CategorieRepository;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\UserGroupRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\NewRepository;
use App\Repositories\Interfaces\NewInterface;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Services\Interfaces\NewServiceInterface;
use App\Services\NewService;
use App\Repositories\Interfaces\UserGroupInterface;
use App\Repositories\Interfaces\UserInterface;
use App\Services\Interfaces\UserGroupServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\UserGroupService;


use App\Repositories\Eloquent\AuthRepository;
use App\Repositories\Interfaces\AuthInterface;
use App\Services\AuthService;
use App\Services\Interfaces\AuthServiceInterface;
use App\Services\UserService;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\CategorieInterface;
use App\Services\CategorieService;
use App\Services\Interfaces\CategorieServiceInterface;

use App\Repositories\Interfaces\CommentInterface;
use App\Services\Interfaces\CommentServiceInterface;
use App\Services\CommentService;
use App\Repositories\Eloquent\CommentRepository;

use App\Repositories\Interfaces\EmailInterface;
use App\Repositories\Eloquent\EmailRepository;
use App\Repositories\Eloquent\SystemLogRepository;
use App\Repositories\Interfaces\SystemLogInterface;
use App\Services\Interfaces\EmailServiceInterface;
use App\Services\EmailService;
use App\Services\Interfaces\SystemLogServiceInterface;
use App\Services\SystemLogService;
use App\Views\Composers\ProfileComposer;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //UserGroup
        $this->app->singleton(RepositoryInterface::class, EloquentRepository::class);
        $this->app->singleton(UserGroupInterface::class, UserGroupRepository::class);
        $this->app->singleton(UserGroupServiceInterface::class, UserGroupService::class);

        //User
        $this->app->singleton(UserInterface::class, UserRepository::class);
        $this->app->singleton(UserServiceInterface::class, UserService::class);

        //Categorie
        $this->app->singleton(CategorieInterface::class, CategorieRepository::class);
        $this->app->singleton(CategorieServiceInterface::class, CategorieService::class);

        //New
        $this->app->singleton(NewInterface::class, NewRepository::class);
        $this->app->singleton(NewServiceInterface::class, NewService::class);

        //Auth
        $this->app->singleton(AuthInterface::class, AuthRepository::class);
        $this->app->singleton(AuthServiceInterface::class, AuthService::class);

        //Comment
        $this->app->singleton(CommentInterface::class, CommentRepository::class);
        $this->app->singleton(CommentServiceInterface::class, CommentService::class);

        //Email
        $this->app->singleton(EmailInterface::class, EmailRepository::class);
        $this->app->singleton(EmailServiceInterface::class, EmailService::class);


        $this->app->singleton(SystemLogInterface::class, SystemLogRepository::class);
        $this->app->singleton(SystemLogServiceInterface::class, SystemLogService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('vi');
        view()->composer(
            ['*'],
            ProfileComposer::class
        );
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        Schema::defaultStringLength(191);
    }
}
