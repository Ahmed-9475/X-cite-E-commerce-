<?php

namespace App\Models;

use App\Models\Product;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,HasSlug;
    protected $table = 'categories';
    public $fillable = ['name','parent_id ','slug ','description','image','status'];

    /// method filter form search 

    public function scopeFilter(Builder $builder,$filters){

        $builder->when($filters['search']??false,function($builder,$value){
            $builder->where('name','LIKE',"%{$value}%");       
        });

        $builder->when($filters['getStatus']??false,function($builder,$value){
            
            $builder->where('status','=',$value) ;
        });

    }

    //method for fetch slug name this package
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    // make relation between category and products

    public function products(){

        return $this->hasMany(Product::class,'category_id');
    }

}
