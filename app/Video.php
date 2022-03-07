<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable; 
class Video extends Model
{
    use Sluggable;
    protected $table = 'videos';
    protected $fillable = ['title','slug','type','description','image','path','price'];

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
         return url('/')."/single/video/$this->slug";
     }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    

}
