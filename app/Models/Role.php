<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function premissions(){
       return $this->belongsToMany(Premission::class);

    }
    public function getRolePremissionsAttribute(){
        return $this->premissions()->get();
    }
    public static function findByTitle($title){
        return self::query()->whereTitle($title)->firstOrFail();
    }
    public function hasPermission($permission){
        return $this->premissions()->where('title',$permission)->exists();
    }
}
