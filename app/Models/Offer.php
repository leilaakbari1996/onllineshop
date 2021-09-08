<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function submitOffer(Request $request){
        Offer::query()->create([
            'code' => $request('code'),
            'starts_at' => $request('starts_at')->format('Y-m-d'),
            'expires_at' => $request('expires_at')->format('Y-m-d')
        ]);
    }
}
