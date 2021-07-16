<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EducationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EducationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EducationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Education::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/education');
        CRUD::setEntityNameStrings('education', 'education');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('user_id');
        CRUD::column('degree_title');
        CRUD::column('institution_name');
        CRUD::column('short_description');
        CRUD::column('start_date');
        CRUD::column('end_date');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(EducationRequest::class);

        CRUD::field('user_id');
        CRUD::field('degree_title');
        CRUD::field('institution_name');
        CRUD::addField(['name'=>'short_description',
            'type'  => 'tinymce',
            // optional overwrite of the configuration array
            'options' => [
                'plugins' => 'image,link,media,anchor,autolink,image,imagetools,table,codesample,code',
                'toolbar' => 'undo redo formatselect fontsizeselect bullist numlist link image bold italic underline forecolor backcolor image imagetools table anchor codesample code',
            ],
        ]);
        CRUD::field('start_date');
        CRUD::field('end_date');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
