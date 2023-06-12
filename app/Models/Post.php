<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ["title","description","content","image","published_at","deleted_at"];

    public function setPublishedAtAttribute($value)
        {
            $this->attributes['published_at'] = date("Y-m-d H:i", strtotime($value));
        }
    
    public function getPublishedAtAttribute($value)
        {
            return date("d M Y h:i a", strtotime($value));
        }    
}
