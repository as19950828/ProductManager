<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    public static function findActiveById($id)
    {
        return self::where('id', $id)->whereNull('deleted_at')->first();
    }

    protected function scopeSearch($query, $search, $target = 'name')
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
