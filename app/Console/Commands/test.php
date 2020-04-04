<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test.';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }



    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       dump(json_decode('[{"title":"首页","url":"https:\/\/vienblog.com"},{"title":"关于作者","url":"https:\/\/vienblog.com"},{"title":"打赏作者","url":"https:\/\/viencoding.com\/pay"},{"title":"建站教程","url":"https:\/\/vienblog.com"},{"title":"科学上网","url":"https:\/\/viencoding.com\/article\/122"},{"title":"网站导航","url":"https:\/\/vienblog.com"},{"title":"机器学习","url":"https:\/\/vienblog.com\/category\/机器学习"},{"title":"Laravel教程","url":"https:\/\/vienblog.com"},{"title":"Python教程","url":"https:\/\/vienblog.com"},{"title":"Git教程","url":"https:\/\/vienblog.com"},{"title":"Docker教程","url":"https:\/\/vienblog.com"},{"title":"友情链接","url":"https:\/\/vienblog.com"}]'));
    }
}
