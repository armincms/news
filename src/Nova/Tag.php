<?php

namespace Armincms\News\Nova;

use Armincms\Taggable\Nova\Tag as Resource;

class Tag extends Resource
{  
    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'News';   

    public function taggables() : array
    {
        return [
            NewsTag::class,
        ];
    }  

    /**
     * Get the URI key for the resource.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'news-'. parent::uriKey();
    }
}
