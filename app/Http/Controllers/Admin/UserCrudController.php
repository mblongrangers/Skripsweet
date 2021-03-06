<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Auth;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\UserRequest as StoreRequest;
use App\Http\Requests\UserRequest as UpdateRequest;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\User');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/user');
        $this->crud->setEntityNameStrings('user', 'users');
        $this->crud->setFromDb();
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->removeColumn('password');
        $this->crud->addField([
        'label' => "Hak Akses",
           'type' => 'select2', // aturan harus
           'name' => 'role_id', // field sumber realasi (fk)
           'entity' => 'role', // function model sumber ke model tujuan
           'attribute' => 'name', // field model tujuan yang mau ditampilkan
           'model' => "App\Role" // model tujuan
        ]);

        $this->crud->addColumn([
           'label' => "Hak Akses",
           'type' => 'select', // aturan harus
           'name' => 'role_id', // field sumber realasi (fk)
           'entity' => 'role', // function model sumber ke model tujuan
           'attribute' => 'name', // field model tujuan yang mau ditampilkan
           'model' => "App\Role" // model tujuan
        ]);

        // $this->crud->addColumn([
        //    'label' => "password",
        //    'type' => 'text', // aturan harus
        //    'name' => 'password', // field sumber realasi (fk)
        // ]);
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        $this->crud->entry->password = bcrypt($this->crud->entry->password);
        $this->crud->entry->save();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
