<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    protected $guarded = [];


    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function image()
    {
        if ($this->image_url != null) {

            return env('APP_URL') . "/storage/" . $this->image_url;
        } else {
            return asset("dashboard/assets/img/noimage.jpg");
        }
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    public function isFavorite(){
        if(auth()->user()){

            $favorite = Favorite::where('user_id',auth()->user()->id)->where('book_id',$this->id)->first();
            if ($favorite) {
                return true;
            }
            return false;
        }
    }

    


}
