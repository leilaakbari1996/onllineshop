<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class Product extends Model
{
    protected $appends = ['cost_with_discount','image_path'];
    use HasFactory;
    protected $guarded = [];
    public function brand(){
        return $this -> belongsTo(Brand::class);
    }
    public function category(){
        return $this -> belongsTo(Category::class);
    }
    public function pictures(){
        return $this->hasMany(Pictuer::class);
    }

    public function discount(){
        return $this->hasOne(Discount::class);
    }
    public function addPicture(HttpRequest $request){
        $path = $request->file('image')->storeAs('public/products/picturs',
        $request->file('image')->getClientOriginalName());
        $this->pictures()->create([
            'image' => $path,
            'mime' => $request->file('image')->getClientMimeType(),
            //'image_small' => $request->file('image')->resize(50,50),
        ]);
    }
    public function deletePicture($picture){
        Storage::delete($picture->image);
        $picture->delete();
    }
    public function addDiscount(HttpFoundationRequest $request){
        if(!$this->discount()->exists()){
            $this->discount()->create([
                'discount' => $request->get('discount')
            ]);
        }else{
            $this->discount->update([
                'discount' => $request->get('discount')
            ]);
        }
    }
    public function deleteDiscount(){
        $this->discount()->delete();
    }

    public function getCostWithDiscountAttribute(){
        if(!$this->discount()->exists()){
            return $this->price;
        }
        $price_old = $this->price - ($this->price * ($this-> discount -> discount /100));
        return $price_old;
    }
    public function getHasDiscountattribute(){
        return $this->discount()->exists();
    }
    public function getDiscountValueAttribute(){
        if($this->has_discount){
            return $this->discount->discount;
        }
        return null;
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class)
            ->withPivot(['value'])
            ->withTimestamps();
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->belongsToMany(User::class,'likes')->withTimestamps();
    }
    public function getIsLikeAttribute(){
        return $this->likes()->where('user_id',auth()->id())->exists();
    }
    public function getImagePathAttribute(){
        return str_replace('public','/storage',$this->image);
    }
}
