<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tags';

    // Для того, чтобы можно было вносить изменения в таблицу, или можно использовать св-во $fillable[].
    protected $guarded = false;
}
