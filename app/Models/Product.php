<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Product extends Model
{
    use CrudTrait;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price'
    ];

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "uploads";

        if ($value==null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        if (starts_with($value, 'data:image'))
        {
            $image = \Image::make($value);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
        }
    }
}
