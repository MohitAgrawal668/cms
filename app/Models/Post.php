<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ["title","description","content","image","published_at","deleted_at", "category_id"];

    public function setPublishedAtAttribute($value)
        {
            $this->attributes['published_at'] = date("Y-m-d H:i", strtotime($value));
        }
    
    public function getPublishedAtAttribute($value)
        {
            return date("d M Y h:i a", strtotime($value));
        }    

    public function category()
        {
            return $this->belongsTo(Category::class);
        }    
}
