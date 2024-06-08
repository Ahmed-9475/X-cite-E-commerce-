<?php

namespace App\Models;

use App\Models\Store;
use App\Models\Category;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,HasSlug;
   // public $fillable = ['name','category_id','store_id ','slug ','description','image','price','compare_price','rating','option','featured','status'];

    public $guarded=[];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


        // make relation between  products and category 

        public function category(){

            return  $this->belongsTo(Category::class,'category_id')->withDefault();
        }
    
        // make relation between  products and category 

        public function store(){

            return  $this->belongsTo(Store::class,'store_id');
        }

        // make relation with model tag

        public function tags(){

            return $this->belongsToMany(Tag::class,'pivot_product_tag');
        }

        public function scopeActive(Builder $builder){

            return $builder->where('status','=','active');
        }

        public function getPercentAttribute(){

            return  number_format($this->compare_price/$this->price*100,0); 
        }


        public function getImageUrlAttribute(){
            // make default image
            if(!$this->image){
                return "https://ortodontiadescomplicada.com.br/wp-content/uploads/2016/10/img-300x300.png";

                // check if inside database url image
            }else if(Str::startsWith($this->image, 'https://')){

                return $this->image;

            }else{ 

                return asset('Dashboard/assets/img/'.$this->image);
            }
        }


}
