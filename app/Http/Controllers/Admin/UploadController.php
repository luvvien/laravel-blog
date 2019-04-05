<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends  Controller
{
    public function image(Request $request)
    {
        if ($request->hasFile('file')
            && $request->file('file')->isValid()
            && in_array($request->file->extension(), ["png", "jpg", "jpeg", "gif"])
        ) {
            $path = $request->file->store(date('Ymd'), config('vienblog.disks.article_image'));

            $url = Storage::disk(config('vienblog.disks.article_image'))->url($path);

            return response()->json(['filename' => $url]);
        }
    }
}