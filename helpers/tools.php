<?php
/**
 * Created by PhpStorm.
 * User: vien
 * Date: 2019/3/27
 * Time: 10:38 AM
 */

/**
 * @func 时间戳格式化
 * @param $timestamp
 * @return false|string
 */
function vn_time($timestamp)
{
    return date('Y-m-d H:i:s', $timestamp);
}

function watermark($imgPath, $savePath, $str)
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