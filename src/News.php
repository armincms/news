<?php

namespace Armincms\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Armincms\Concerns\IntractsWithMedia; 
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Cviebrock\EloquentSluggable\Sluggable;
use Armincms\Taggable\Taggable;
use Armincms\Categorizable\Categorizable;

class News extends Model implements HasMedia
{
    use SoftDeletes, IntractsWithMedia, Sluggable, Taggable, Categorizable;
      

    protected $medias = [
        'image' => [  
            'disk' => 'armin.image',
            'schemas' => [
                'news.list', 'news', '*',
            ],
        ], 
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'headline'
            ]
        ];  
    }

    public function ensureCode()
    {
        $this->when(is_null($this->code), function() {
            while ($this->whereCode($this->code = $this->generateCode())->first()); 
        });

        return $this;
    } 

    public function generateCode()
    {
        return time();
    }
}
