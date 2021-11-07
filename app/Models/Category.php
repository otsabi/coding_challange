<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['name','category_id'];

    public function parent_category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
