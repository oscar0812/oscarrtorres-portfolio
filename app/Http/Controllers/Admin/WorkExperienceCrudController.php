<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WorkExperienceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class WorkExperienceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WorkExperienceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\WorkExperience::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/work-experience');
        CRUD::setEntityNameStrings('work experience', 'work experiences');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('work_title');
        // CRUD::column('user_id');
        CRUD::column('company_name');
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
        CRUD::setValidation(WorkExperienceRequest::class);

        CRUD::field('user_id');
        CRUD::field('work_title');
        CRUD::field('company_name');
        CRUD::addField(['name'=>'short_description',
            'type'  => 'tinymce',
            // optional overwrite of the configuration array
            'options' => [
                'plugins' => 'lists,image,link,media,anchor,autolink,imagetools,autoresize,table,codesample,code',
                'toolbar' => 'undo redo formatselect fontsizeselect bullist numlist indent link image bold italic underline forecolor backcolor table anchor codesample code',
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
