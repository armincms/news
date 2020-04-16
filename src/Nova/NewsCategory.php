<?php

namespace Armincms\News\Nova;
  
use Armincms\Categorizable\Nova\Categorizable;
use Illuminate\Http\Request; 
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;  
use Laravel\Nova\Fields\Boolean;  

class NewsCategory extends Categorizable
{  
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static function fields(Request $request) : array
    {
        return [
            ID::make("ID")->sortable(),               
        ];
    }  

    /**
     * Get the Config key for the resource.
     *
     * @return string
     */
    public static function configKey()
    {
        return News::uriKey();
    }

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('News');
    }
}
