<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'maker_id',
        'deleted_at',
    ];

    public function scopeSearch($query, $search, $target)
    {
        if ($search !== null) {
            $search_kana = mb_convert_kana($search, 's');
            $search_split = preg_split('/[\s]+/', $search_kana);
            foreach ($search_split as $value) {
                $query->where($target, 'like', '%' . $value . '%');
            }
        }
        return $query;
    }
}
