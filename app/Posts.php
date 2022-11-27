<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = ['po_title', 'updated_at','po_hot','id','po_category_post_id','created_at','po_content','po_keywords','po_active','po_admin_id','po_thunbar','po_description'];
    public    $timestamps = true;


    public function getAdmin()
    {
        return $this->belongsTo('App\Admins');
    }

    public function questions()
    {
        return $this->hasMany('App\Questions','qs_post_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryPosts::class,'po_category_post_id');
    }
}
