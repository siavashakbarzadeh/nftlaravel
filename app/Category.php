<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";
    //protected $fillable=['name','parent_id'];
    protected $guarded=[];

    public function getParent()
{
    return $this->hasOne('App\category','id','parent_id')->withDefault(['name'=>'----']);
}

    public function getChild()
    {
        return $this->hasMany('App\Category','parent_id');
    }
    
    public function book()
    {
        return $this->hasOne(Book::class);
    }

    public function videos()
    {
        return $this->blongsToMany(Video::class);
    }

    public function books()
    {
        return $this->blongsToMany(Book::class);
    }

}
