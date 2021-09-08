<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function propertyGroup(){
        return $this->belongsTo(PropertyGroup::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot(['value'])->withTimestamps();
    }
    public function getValueForProperty(Product $product){
        $query = $this->products()->where('product_id',$product->id);
        if(!$query->exists()){
            return null;
        }
        return $query->first()->pivot->value;
    }
}
