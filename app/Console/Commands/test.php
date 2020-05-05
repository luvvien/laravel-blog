<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Imagick;
use ImagickDraw;
use ImagickPixel;

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
//       dump(json_decode('[{"title":"首页","url":"https:\/\/vienblog.com"},{"title":"关于作者","url":"https:\/\/vienblog.com"},{"title":"打赏作者","url":"https:\/\/viencoding.com\/pay"},{"title":"建站教程","url":"https:\/\/vienblog.com"},{"title":"科学上网","url":"https:\/\/viencoding.com\/article\/122"},{"title":"网站导航","url":"https:\/\/vienblog.com"},{"title":"机器学习","url":"https:\/\/vienblog.com\/category\/机器学习"},{"title":"Laravel教程","url":"https:\/\/vienblog.com"},{"title":"Python教程","url":"https:\/\/vienblog.com"},{"title":"Git教程","url":"https:\/\/vienblog.com"},{"title":"Docker教程","url":"https:\/\/vienblog.com"},{"title":"友情链接","url":"https:\/\/vienblog.com"}]'));
        $str="Vien@vienblog.com";
        $imgPath = "/Users/vien/PhpstormProjects/laravel-blog/public/images/avatars/lbxx-3.jpg";
//        $imgPath = "/Users/vien/PhpstormProjects/laravel-blog/public/images/avatars/ttt.png";
        $savePath = "public/bar.jpg";
//        watermark($imgPath, $savePath, $str);
        $this->tree(storage_path('app/public'));
    }

    public function tree($directory)
    {
        $mydir = dir($directory);
        while($file = $mydir->read())
        {
            if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!=".."))
            {
//                echo "$file\n";
                $this->tree("$directory/$file");
            }
            else
//                echo "$file\n";
                if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpeg', 'jpg', 'png'])) {
                    echo "$directory/$file\n";
                    watermark("$directory/$file", "$directory/$file", "vienblog.com");
                }
        }
        $mydir->close();
    }

//    public function addWatermark()
//    {
//
//    }

    public function water($imgPath, $savePath, $str)
    {
        $ext = strtolower(pathinfo($imgPath, PATHINFO_EXTENSION));
        if ($ext == "png") {
            $im = imagecreatefrompng($imgPath);
        } else if (in_array($ext, ['jpeg', 'jpg'])) {
            $im = imagecreatefromjpeg($imgPath);
        } else {
            // 格式不是png和jpg不加水印
            return;
        }

        // 载入字体zt.ttf
        $fnt = resource_path("/fonts/fzsj.ttf");
        // 文字相对于高度或者宽度的比例
        $scale = 0.04;
        // 设置颜色，用于文字字体的白和阴影的黑
        $white=imagecolorallocate($im,255,255,255);
        $black=imagecolorallocate($im,50,50,50);
        // 计算文字大小和位置
        $imgInfo = getimagesize($imgPath);
        $width = $imgInfo[0];
        $height = $imgInfo[1];
        $textSize = ($height + $width) / 2 * $scale;
        $bbox = imagettfbbox($textSize, 0, $fnt, $str);
        $textWidth = abs($bbox[2] - $bbox[0]);
        $textHeight = abs($bbox[3] - $bbox[5]);
        $top = $height - $textHeight / 1.8;
        $left = $width - $textSize - $textWidth;

        // 超出画幅不加水印
        if ($top < 0 || $left < 0) return;

        //在图片中添加文字，imagettftext (image,size,angle, x, y,color,fontfile,text)
        imagettftext($im,$textSize, 0, $left+1, $top+1, $black, $fnt, $str);
        imagettftext($im,$textSize, 0, $left, $top, $white, $fnt, $str);
        //将$im输出
        ImageJpeg($im, $savePath);
        //销毁$im对象
        ImageDestroy($im);
    }

    public function water2() {
        $canvas = new Imagick();
        $canvas->newImage(500, 200, 'white');
        $canvas->setImageFormat('png');

        $text = new Imagick();
        $text->newImage(500, 200, 'none');
        $text->setImageFormat('png');

        $draw = new ImagickDraw();
        $draw->setFillColor(new ImagickPixel('#f00'));
        $draw->setFontSize(50);
        $draw->annotation(100, 60, 'welcome');
        $text->drawImage($draw);

        $draw->setFillColor(new ImagickPixel('#fff'));
        $draw->setFontSize(50);
        $draw->annotation(100, 120, 'welcome');
        $text->drawImage($draw);

//        $shadow_layer = $text->clone();
        $shadow_layer = clone $text;
        $shadow_layer->setImageBackgroundColor(new ImagickPixel('#555'));
        $shadow_layer->shadowImage(80, 0.8, 0, 0);
        $shadow_layer->compositeImage($text, Imagick::COMPOSITE_OVER, 0, 0 );
        $canvas->compositeImage($shadow_layer, imagick::COMPOSITE_DEFAULT, 0, 0);

        header("Content-type: image/{$canvas->getImageFormat()}");
        echo $canvas->getImageBlob();
    }
}
