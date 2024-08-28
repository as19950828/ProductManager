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
}
