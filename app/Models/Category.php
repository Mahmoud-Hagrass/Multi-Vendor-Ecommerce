<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasTranslations , Sluggable , HasFactory;

    public array $translatable = ['name'];

    protected $fillable = ['name' , 'slug' , 'parent_id' , 'status'] ;


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name' ,
            ]
        ];
    }


    public function getCategoryStatus()
    {
        return $this->status == 1 ? __('dashboard.active') : __('dashboard.in_active');
    }

    public function getDate()
    {
        return $this->created_at->format('d-m-Y') ;
    }
}
