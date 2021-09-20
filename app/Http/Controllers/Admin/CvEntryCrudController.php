<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CvEntryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CvEntryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CvEntryCrudController extends CrudController
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
        CRUD::setModel(\App\Models\CvEntry::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/cv-entry');
        CRUD::setEntityNameStrings('cv entry', 'cv entries');
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
        CRUD::column('title');
        CRUD::column('cv_section_id');
        CRUD::column('place_name');
        CRUD::column('short_description');
        CRUD::column('start_date');
        CRUD::column('end_date');

        $arr_ = \App\Models\CvSection::get();
        $id_to_name = [];
        foreach ($arr_ as $obj) {
            $id_to_name[$obj->id] = $obj->name;
        }

        CRUD::addFilter([
          'name'  => 'cv_section',
          'type'  => 'select2',
        ], $id_to_name, function ($value) { // if the filter is active
            CRUD::addClause('where', 'cv_section_id', $value);
        });

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
        CRUD::setValidation(CvEntryRequest::class);

        CRUD::field('user_id');
        CRUD::field('cv_section_id');
        CRUD::field('title');
        CRUD::field('place_name');
        CRUD::addField(['name'=>'short_description',
            'type'  => 'tinymce',
            // optional overwrite of the configuration array
            'options' => [
                'plugins' => 'lists,image,link,media,anchor,autolink,imagetools,autoresize,table,codesample,code',
                'toolbar' => 'undo redo formatselect fontsizeselect bullist numlist indent link image bold italic underline forecolor backcolor table anchor codesample code',
                'imagetools_cors_hosts'=> [ 'homestead.com', 'oscarrtorres.com' ],
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
