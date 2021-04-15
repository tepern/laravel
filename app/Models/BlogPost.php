<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Категория статьи.
     * 
     * @return \Illumimate\Database\Eloquent\Relations\BelongsTo\
     */
    public function category()
    {
        //Категория статьи
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * Автор статьи.
     * 
     * @return \Illumimate\Database\Eloquent\Relations\BelongsTo\
     */
    public function user()
    {
        //Автор статьи
        return $this->belongsTo(User::class);
    }
}
