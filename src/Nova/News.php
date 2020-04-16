<?php

namespace Armincms\News\Nova;
 
use Illuminate\Support\Facades\Date;
use Illuminate\Http\Request; 
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text; 
use Laravel\Nova\Fields\Select; 
use Laravel\Nova\Fields\Boolean; 
use Laravel\Nova\Fields\Heading; 
use Laravel\Nova\Fields\DateTime; 
use Laravel\Nova\Fields\belongsTo;  
use Armincms\Fields\BelongsToMany;
use Whitecube\NovaFlexibleContent\Flexible;
use Armincms\RawData\Common; 

class News extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Armincms\\News\\News';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'headline';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'headline', 'kicker', 'deck'
    ]; 

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make('ID')->sortable(),

            Text::make(__('News Code'), 'code')   
                ->readonly($request->isMethod('get'))
                ->canSee(function($request) { 
                    $editing = $request->isCreateOrAttachRequest() || $request->isUpdateOrUpdateAttachedRequest(); 

                    return ! $editing || ! $request->isMethod('get');
                })
                ->fillUsing(function($request, $model) {
                    $model->ensureCode();
                }),

            new Panel(__('News Headline'), [
 
                Select::make(__('Status'), 'mark_as')
                    ->options(collect([
                            'draft'     => __('Draft'),
                            'pending'   => __('Pending'),
                            'review'    => __('Review'),
                            'publish'   => __('Publish'),
                            'archive'   => __('Archive'),
                        ])->filter(function($value, $action) use ($request) {
                            $can = $request->user()->can($action, $this->resource ?? static::newModel());

                            return is_null($can) || $can;
                    }))
                    ->displayUsingLabels()
                    ->required()
                    ->rules('required')
                    ->default('draft'),

                Text::make(__('Headline'), 'headline')
                    ->sortable()
                    ->required()
                    ->rules('required'),

                Text::make(__('Kicker'), 'kicker')
                    ->sortable()
                    ->nullable(),

                Text::make(__('Deck'), 'deck')
                    ->sortable()
                    ->nullable(), 

                BelongsToMany::make(__('Tags'), 'tags', Tag::class) 
                    ->hideFromIndex()
                    ->fillUsing(function($pivots) {
                        return array_merge($pivots, [
                            'taggable_type' => static::newModel()->getMorphClass() 
                        ]);
                    }),

                BelongsToMany::make(__('Categories'), 'categories', Category::class) 
                    ->hideFromIndex()
                    ->fillUsing(function($pivots) {
                        return array_merge($pivots, [
                            'categoriable_type' => static::newModel()->getMorphClass() 
                        ]);
                    }),

                Flexible::make(__('Headline Summaries'), 'summaries')
                    ->addLayout('', 'summary', [
                        Text::make(__('Summary'), 'summary')
                    ]) 
                    ->confirmRemove()  
                    ->button(__('Add Summary')),

                $this->imageField(),
            ]), 

            new Panel(__('News Context'), [

                $this->abstractField(),

                $this->gutenbergField(),
            ]),
        ];
    } 
}
