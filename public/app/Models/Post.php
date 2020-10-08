<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Post $post) {
            if (Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
        });

        static::creating(function (Post $post) {

            if (!app()->runningInConsole()) {

                $post->user_id = auth()->user()->id;

                if (request()->file('image')) {
                    $post->image = Storage::disk('public')->put('posts', request()->file('image'));
                } else {
                    $post->image = '';
                }
            }

        });
    }

    protected $fillable = [
        'user_id', 'title', 'description', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
