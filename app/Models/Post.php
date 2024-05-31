<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Storage;


class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];


    protected function casts(): array
    {
        return [
            'published_at'=>'datetime',
        ];
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getStatusAttribute() {
        return $this->published_at == null ? "<span class='badge bg-warning'>Draft</span>" : "<span class='badge bg-success'>Published</span>";
    }

    public function scopePublished($query) {
        return $query->whereNotNull('published_at');
    }

    public function scopeSearch($query) {
        $searchKey = request('search');

        if($searchKey) {
            $query = $query->where('title','like',"%${searchKey}%");
        }
        return $query;
    }

    public function getIsPublishedAttribute() {
        return $this->published_at !== null;
    }

    public function getImageAttribute() {
        return 'storage/'.$this->image_path;
    }

    public function deleteImage(): bool {
        return Storage::delete($this->image_path);
    }
}
