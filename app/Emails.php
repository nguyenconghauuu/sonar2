<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    protected $table = 'email';
    protected $fillable = ['id', 'updated_at','e_email','e_drive','e_post','created_at','e_password'];
    public    $timestamps = false;
}
