<?php

namespace App\Models\Index;

use App\Models\Base\BaseModel;

class Link extends BaseModel
{
    //
    protected $table = 'friend_links';
    protected $fillable = ['title', 'description', 'url', 'img', 'follow'];
    protected $allowEmpty = ['img'];
}
