<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProducts extends Model
{
    protected $table = 'categoryproducts';
    protected $fillable = ['cpr_name', 'updated_at','cpr_hot','cpr_sort','id','cpr_type','cpr_parent_id','created_at'];
    public    $timestamps = true;

    public static function recursive($listProCategory ,$parents = 0 ,$level = 1 ,&$CategoryProductListSort)
    {
        if(count($listProCategory) > 0 )
        {
            foreach ($listProCategory as $key => $value) {
                if($value->cpr_parent_id  == $parents)
                {
                    $value->level = $level;
                    $CategoryProductListSort[] = $value;
                    unset($listProCategory[$key]);
                    $newparents = $value->id;
                    self::recursive($listProCategory , $newparents ,$level + 1 , $CategoryProductListSort);
                }
            }
        }
    }
}
