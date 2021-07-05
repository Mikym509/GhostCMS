<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'image_path',
        'created_at',
        'updated_at',
        'user_id',
    ];

    protected $table = 'gallery';
    public $timestamps = true;
}
