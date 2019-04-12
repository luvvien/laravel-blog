<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use yasmuru\LaravelTinify\Facades\Tinify;

class UploadController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function image(Request $request)
    {
        if ($request->hasFile('file')
            && $request->file('file')->isValid()
            && in_array($request->file->extension(), ["png", "jpg", "jpeg", "gif"])
        ) {
            $path = $request->file->store(date('Ymd'), config('vienblog.disks.article_image'));

            $url = Storage::disk(config('vienblog.disks.article_image'))->url($path);

            if (env('TINIFY_APIKEY', '') && in_array($request->file->extension(), ["png", "jpg", "jpeg"])) {
                try {
                    set_time_limit(300);
                    $oldPath = public_path($url);
                    $result = Tinify::fromFile($oldPath);
                    $result->toFile($oldPath);
                } catch (\Exception $e){
                    return response()->json(['filename' => $url]);
                }
            }
//            $img = Image::make($oldPath);
//
//            $thumbnailPath = pathinfo($oldPath, PATHINFO_DIRNAME).'/thumbnail/';
//
//            if(!file_exists($thumbnailPath)){
//                mkdir ($thumbnailPath);
//            }
//
//            $newPath = $thumbnailPath.pathinfo($oldPath, PATHINFO_FILENAME).'.jpg';
//
//            $img->text('The quick brown fox jumps over the lazy dog.', 120, 100);
//
//            $img->save($newPath, 100);

            return response()->json(['filename' => $url]);
        }
    }
}