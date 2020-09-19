<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\OrderRequest as StoreRequest;
use App\Http\Requests\OrderRequest as UpdateRequest;
use App\Order;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel('App\Order');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order');
        $this->crud->setEntityNameStrings('order', 'orders');
        $this->crud->setFromDb();
        $this->crud->removeColumns(['address_id', 'discount', 'cart_id']);
        $this->crud->denyAccess(['create', 'update']);
        $this->crud->addColumn(
            [
               'name' => "order_number",
               'label' => "Order Number",
               'type' => "model_function",
               'function_name' => 'orderNumber'
            ]
        );
        $this->crud->addColumn(
            [
               'name' => "payment_id",
               'label' => "Status Pembayaran",
               'type' => "model_function",
               'function_name' => 'status'
            ]
        );
        $this->crud->addColumn(
            [
               'name' => "total_pembayaran",
               'label' => "Total Pembayaran",
               'type' => "model_function",
               'function_name' => 'subTotal'
            ]
        );
        $this->crud->addColumn(
            [
               'label' => "Customer",
               'type' => "select",
               'name' => 'customer_id',
               'entity' => 'customer',
               'attribute' => "name",
               'model' => "App\Customer",
            ]
        );
        $this->crud->addButtonFromView('line', 'detail', 'detail', 'beginning');
        $this->crud->addButtonFromView('line', 'invoice', 'invoice', 'end');
        $this->crud->addButtonFromView('line', 'delivery', 'delivery', 'end');
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
