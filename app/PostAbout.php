<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostAbout extends Model
{
    protected $table = 'posts_about';
    protected $fillable = ['po_title', 'updated_at','po_hot','id','po_category_post_id','created_at','po_content','po_keywords','po_active','po_thunbar','po_description'];
    public    $timestamps = true;
}
