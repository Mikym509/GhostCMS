<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'slug',
        'title',
        'tag',
        'description',
        'image_path',
        'type',
        'user_id',
        'category_id'
    ];

    //in sostanza la foreign key dell'utente
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array{
        return [
          'slug'=> [
              'source'=> 'title'
          ]
        ];
    }
}
