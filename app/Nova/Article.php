<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;

use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Article extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Article::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','title','description'
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
            ID::make(__('ID'), 'id')->sortable(),
            Text::make(__('Titulo'),'title')->sortable(),
            Textarea::make(__('Descripción'),'description'),
            Boolean::make(__('Publicado'),'published')
                    ->hideWhenCreating()
                    ->readonly(function($request){
                        return ! $request->user()->isRevisor();
                    }),
            BelongsTo::make(__('Author'), 'user', 'App\Nova\User')
                    ->default($request->user()->getKey())
                    ->readonly(
                        function($request){
                            return ! $request->user()->isAdmin();
                        }
                    ),
            KeyValue::make(__('Meta'),'meta')->rules('json'),
            DateTime::make(__('Modificado el'),'updated_at')
                    ->format('DD/MM/YYYY HH:mm:ss') // js style
                    ->pickerDisplayFormat('d/m/Y H:i:S') // carbon style
                    ->onlyOnDetail(),
            Date::make(__('Creado el'),'created_at')
                    ->format('DD/MM/YYYY') // js style
                    ->pickerDisplayFormat('d/m/Y') // carbon style
                    ->onlyOnDetail()
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
