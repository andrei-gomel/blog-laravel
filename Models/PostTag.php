<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'post_tags';

    // Для того, чтобы можно было вносить изменения в таблицу, или можно использовать св-во $fillable[].
    protected $guarded = false;
}
