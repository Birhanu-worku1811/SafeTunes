<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Artist;
use App\Models\Music;
use App\Models\News;
use App\Policies\ArtistPolicy;
use App\Policies\MusicPolicy;
use App\Policies\NewsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Artist::class=>ArtistPolicy::class,
        Music::class=>MusicPolicy::class,
        News::class=>NewsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
