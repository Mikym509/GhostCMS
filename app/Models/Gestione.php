<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestione extends Model
{
    use HasFactory;

    protected $fillable= [
        'id',
        'user_id',
        'category_id',
    ];

    protected $table = 'gestione';
    public $timestamps = 'true';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
