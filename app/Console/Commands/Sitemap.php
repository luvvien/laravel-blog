<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class Sitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate sitemap.';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function generate()
    {
        $domain = config('APP_URL', '');
        // create new sitemap object
        $sitemap = App::make("sitemap");

        // add items to the sitemap (url, date, priority, freq)
        $sitemap->add(URL::to('/'), date("Y-m-d\TH:i:s+00:00", time()), '0.8', 'daily');

        $articles = DB::select("select id, slug from blog_articles");
        $tags = DB::select("select id, tag_name from blog_tags");
        $categories = DB::select("select id, cate_name from blog_categories");

        foreach ($articles as $article) {
            $url = $domain.'/'.$article->slug;
            $sitemap->add(URL::to($url), date("Y-m-d\TH:i:s+00:00", time()), '0.8', 'daily');
        }

        foreach ($tags as $tag) {
            $url = $domain.'/tag/'.$tag->tag_name;
            $sitemap->add(URL::to($url), date("Y-m-d\TH:i:s+00:00", time()), '0.8', 'daily');
        }

        foreach ($categories as $category) {
            $url = $domain.'/category/'.$category->cate_name;
            $sitemap->add(URL::to($url), date("Y-m-d\TH:i:s+00:00", time()), '0.8', 'daily');
        }


        // generate your sitemap (format, filename)
        $sitemap->store('xml', 'sitemap_20200520');

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Generating sitemap...');
        $this->generate();
    }
}
