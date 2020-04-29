<?php

namespace App\Http\Controllers\Admin\Index;

use App\Models\Blog\Article;
use App\Models\Blog\ArticleTag;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use App\Models\Index\File;
use App\Models\Index\Information;
use App\Models\Index\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //
    public function add(Request $request)
    {
        return view('admin.upload.file.add');
    }

    public function all(Request $request)
    {
        $files = File::query()->get()->all();

        $filesArr = [];
        foreach ($files as $file) {
            $f = [];
            $f['path'] = $file->path;
            $f['category'] = $file->category;
            $f['created_at'] = $file->created_at;
            if (in_array($file->extension, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $f['type'] = "img";
            } else {
                $f['type']= "file";
            }
            $filesArr[] = $f;
        }

        return view('admin.upload.file.all', ['files' => $filesArr]);
    }

    public function upload(Request $request)
    {
        $input = $request->input();
        if ($request->hasFile('file')
            && $request->file('file')->isValid()
        ) {
            $path = $request->file->store(date('Ymd'), config('vienblog.disks.files'));
            $url = Storage::disk(config('vienblog.disks.files'))->url($path);
//            return response()->json(['filename' => $url]);
            $file = new File();
            $file->path = $url;
            $file->extension = $request->file->extension();
            $file->category = "file";
            $file->save();

            if (in_array($request->file->extension(), ["png", "jpg", "jpeg", "gif", "webp"])) {
                $type = "img";
            } else {
                $type = "file";
            }
            return view('admin.upload.file.add', ['filename' => $url, 'type' => $type])->with(['message' => 'success']);
        }

        return view('admin.upload.file.add', ['filename' => 'Upload fail.'])->with(['message' => 'fail']);
    }
}
