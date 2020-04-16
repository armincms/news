<?php

namespace Armincms\News\Nova;

use Armincms\Categorizable\Nova\Category as Resource;

class Category extends Resource
{  
    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'News';   

    public function categorizables() : array
    {
        return [
            NewsCategory::class,
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
