<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'image_path',
        'description',
        'buying_price',
        'selling_price',
        'excepted_profit',
        'eraned_profit',
        'company',
        'status'
    ];


    public function GetLogoImage()
    {
        return env('DOMAIN_URL') . Storage::url($this->image_path);
    }

    public function DeleteLogoImage()
    {        
        if (Storage::exists($this->image_path)) 
        {
            Storage::delete($this->image_path);
        }
    }

    // Define the relationship
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

    
}
