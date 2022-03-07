<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * @property mixed Category
 */
class Book extends Model
{
    use Sluggable;
    protected $table = 'books';
    protected $fillable = ['title','slug','type','description','image','path','price'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
     public function pathSlug()
     {
         return url('/')."/single/book/$this->slug";
     }


     public function payments()
    {
        return $this->hasMany(Payment::class);
    }   

}
