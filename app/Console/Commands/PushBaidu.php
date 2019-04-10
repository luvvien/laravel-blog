<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PushBaidu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:baidu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Push new to Baidu.';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function push($urls)
    {
        $api = config('vienblog.baidu.manual_push.api');
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        echo $result;
        return $result;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        dump(config('vienblog.baidu.manual_push.open'));
        if(!config('vienblog.baidu.manual_push.open')) {
            dump('未开启主动推送，请在config/vienblog.php中的baidu选项中根据注释内容配置，开启主动推送需要先配置domain和api');
            return;
        }

        $domain = config('vienblog.baidu.manual_push.domain');

        $articles = DB::select("select id, slug from blog_articles");
        $tags = DB::select("select id, tag_name from blog_tags");
        $categories = DB::select("select id, cate_name from blog_categories");
        $postedUrls = DB::table("baidu_posted_urls")->get()->map(function ($value) {
            return (array)$value;
        })->toArray();
        $postedUrlsArray = array();
        foreach ($postedUrls as $postedUrl) {
            array_push($postedUrlsArray, $postedUrl['url']);
        }
//        $postedUrls = json_decode(json_encode($postedUrls), true);

        $urls = array($domain);
        foreach ($articles as $article) {
            $url = $domain.'/'.$article->slug;
            array_push($urls, $url);
        }
        $tagUrls = array();
        foreach ($tags as $tag) {
            $url = $domain.'/tag/'.$tag->tag_name;
            array_push($tagUrls, $url);
        }
        $catUrls = array();
        foreach ($categories as $category) {
            $url = $domain.'/category/'.$category->cate_name;
            array_push($catUrls, $url);
        }
        $finalUrls = array_diff(array_merge($tagUrls, $catUrls, $urls), $postedUrlsArray);

        if (count($finalUrls) == 0) {
            $this->info('no new url needs to post.');
            return;
        }

        dump($finalUrls);

        $res = $this->push($finalUrls);
        $res = json_decode($res);
        dump($res);
        if (isset($res->success)) {
            $doneUrls = array();
            foreach ($finalUrls as $url) {
                array_push($doneUrls, ['url' => $url]);
            }
            DB::table('baidu_posted_urls')->insert($doneUrls);
            dump('success');
        }
        if(isset($res->error)) {
            dump('error: ');
            dump($res->error);
        }
    }
}
