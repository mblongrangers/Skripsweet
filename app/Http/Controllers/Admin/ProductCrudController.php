<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;
use App\Product;
/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('product', 'products');
        // $this->crud->setFromDb();

        $this->crud->addField([
           'name' => 'name',
           'label' => 'Nama Barang',
        ]);

        $this->crud->addField([
            'label' => "Photos",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'crop' => false,
            'aspect_ratio' => 1
        ]);

        $this->crud->addField([
           'name' => 'description',
           'label' => 'Keterangan',
            'type' => 'text',
        ]);

        $this->crud->addField([
           'name' => 'price',
           'label' => 'Harga',
           'type' => 'number',
        ]);

        $this->crud->addColumn([
        'name' => 'id',
        'label' => 'ID Barang'
        ]);

        $this->crud->addColumn([
           'name' => 'name',
           'label' => 'Nama Barang',
        ]);

        $this->crud->addColumn([
            'name' => 'image',
            'label' => "Photos",
            'type' => 'image',
            'prefix' => 'storage/'
         ]);

        $this->crud->addColumn([
           'name' => 'description',
           'label' => 'Keterangan',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
           'name' => 'price',
           'label' => 'Harga',
           'type' => 'number',
        ]);

        // $this->crud->addField([
        // 'name' => 'id',
        // // 'label' => 'ID'
        // ]);

        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        $redirect_location = parent::storeCrud($request);
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $redirect_location = parent::updateCrud($request);
        return $redirect_location;
    }
}
