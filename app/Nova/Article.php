<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;

use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Waynestate\Nova\CKEditor;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;

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
            Images::make('Main image', 'main-image') // second parameter is the media collection name
            ->conversionOnIndexView('thumb') // conversion used to display the image
            ->withResponsiveImages()
            ->rules('required'), // validation rules
            Text::make(__('Titulo'),'title')->sortable(),
            CKEditor::make(__('Descripción'),'description')->options([
                'height' => 300,
                'toolbar' => [
                    ['Source','-','Cut','Copy','Paste'],
                    ['Format', 'FontSize'],
                    ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],

                    ['Bold', 'Italic', 'Strike', '-', 'Subscript', 'Superscript'],
            ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight'],
            ['Link', 'Unlink', 'Anchor'],
                ],
            ])->hideFromIndex(),
            Images::make('Images', 'content-images') // second parameter is the media collection name
            ->conversionOnPreview('thumb') // conversion used to display the "original" image
            ->conversionOnDetailView('thumb') // conversion used on the model's view
            ->conversionOnIndexView('thumb') // conversion used to display the image on the model's index page
            ->conversionOnForm('thumb') // conversion used to display the image on the model's form
            // ->fullSize() // full size column
            ->rules('required')
            // validation rules for the collection of images
            ->singleImageRules('dimensions:min_width=100')
            ->enableExistingMedia()
            ->withResponsiveImages(),
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
            KeyValue::make(__('Meta tags'),'meta')
            // ->withMeta(['value'=>$this->meta ?? ['title'=>'','description'=>'']])
            ->rules('json'),
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
