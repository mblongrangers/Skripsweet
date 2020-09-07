<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Backpack\CRUD\CrudPanel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\Manual_invoiceRequest as StoreRequest;
use App\Http\Requests\Manual_invoiceRequest as UpdateRequest;
use App\ManualInvoice as Invoice;

/**
 * Class Manual_invoiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class Manual_invoiceCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel('App\Models\Manual_invoice');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/manual_invoice');
        $this->crud->setEntityNameStrings('manual_invoice', 'manual_invoices');
        $this->crud->setFromDb();
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        $this->crud->removeFields(['number', 'subtotal', 'discount', 'tax', 'paid', 'total']);
        $this->crud->addButtonFromView('line', 'addProducts', 'addProducts', 'end');
        $this->crud->addField([
           'name' => 'created_at',
           'label' => 'Tanggal',
           'type' => 'date_picker',
               'datetime_picker_options' => [
                   'todayBtn' => true,
                   'format' => 'D MMM YYYY',
                   'language' => 'en'
               ],
               'allows_null' => true,
        ]);
        $this->crud->addColumn([
            'name' => 'created_at',
            'label' => 'Tanggal',
            'type' => 'text'
        ]);
    }

    public function store(StoreRequest $request)
    {
        $redirect_location = parent::storeCrud($request);
        
        $inv = Invoice::find($this->crud->entry->id);
        $inv->number = $this->crud->entry->id . '/INV/' . date('Y');
        $inv->save();

        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $redirect_location = parent::updateCrud($request);
        return $redirect_location;
    }
}
