<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Carbon\Carbon;

class Manual_invoice extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'manual_invoices';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'customer',
        'address',
        'phone',
        'created_at'
    ];

    public function products()
    {
        return $this->belongsToMany(\App\Product::class, 'manual_invoice_id')->withPivot('quantity');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('j F Y');
    }
}
