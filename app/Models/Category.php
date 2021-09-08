<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function parent(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function children(){
        return $this->hasMany(Category::class,'category_id');
    }
    public function getallsubCategoryProduct(){//find childrens category.get products category_id member $childrenIds
        $childrenIds = $this -> children()->pluck('id');
        return Product::query()->whereIn('category_id',$childrenIds)->
        orwhere('category_id',$this->id)
        ->get();
    }
    public function getHasChildrenAttribute(){
        return $this-> children() -> count() > 0;
    }
    public function propertyGroups(){
        return $this->belongsToMany(PropertyGroup::class);
    }
    public function hasPropertyGroup(PropertyGroup $propertyGroup){
        return $this->propertyGroups()->where('property_group_id',$propertyGroup->id)->exists();
    }
    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }

}
