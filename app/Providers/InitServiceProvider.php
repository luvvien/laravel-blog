<?php

namespace App\Providers;

use App\Models\Index\Information;
use Illuminate\Support\ServiceProvider;

class InitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $information = Information::query()
            ->select( 'site_title', 'site_keywords', 'site_description', 'author_name', 'author_intro', 'author_avatar', 'navigation')
            ->first();



        if ($information) {
            $blog = [
                "name" => $information->site_title,
                "keywords" => $information->site_keywords,
                "description" => $information->site_description,
            ];

            $this->app->get('config')->set('vienblog.blog', $blog);

            $author = [ // 博主
                "name" => $information->author_name,
                "description" => $information->author_intro,
                "avatar" => $information->author_avatar,
            ];

            $this->app->get('config')->set('vienblog.author', $author);
        }


//        $article = $article->toArray();


    }
}
