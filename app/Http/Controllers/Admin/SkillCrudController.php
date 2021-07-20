<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SkillRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SkillCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SkillCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Skill::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/skill');
        CRUD::setEntityNameStrings('skill', 'skills');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::column('user_id');
        CRUD::column('name');
        CRUD::column('progress');
        CRUD::addColumn(['name' => 'skill_group_id',
          'type'=>'relationship',
          'attribute'=>'name',
          'entity'    => 'skill_group',
          'model'     => 'App\Models\SkillGroup',

        ]);

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
        CRUD::setValidation(SkillRequest::class);

        CRUD::field('user_id');
        CRUD::field('name');
        CRUD::field('progress');

        CRUD::addField([
          'type' => "relationship",
          'name' => 'skill_group', // the method on your model that defines the relationship
          'ajax' => false,
          'inline_create' => [
              'entity' => 'skill-group', // the entity in singular

            ]
        ]);

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

    protected function fetchSkill_group()
    {
        // $this->setupCreateOperation();

        return $this->fetch(\App\Models\SkillGroup::class);
    }
}
