<?php

namespace App\Http\Controllers;

use App\Http\Resources\ParsingResource;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParsingController extends Controller
{
    protected $products;

    public function __construct()
    {
        $this->products = [];
    }

    public function store()
    {
        foreach ($this->products as $item) {
            $brand = Brand::firstOrCreate([
                'name' => $item['brand_id']
            ]);
            $item['brand_id'] = $brand->id;

            $product = Product::firstOrNew([
                'name' => $item['name'],
                'brand_id' => $item['brand_id'],
                'dimensions' => $item['dimensions']
            ]);
            $product->fill($item);
            $product->save();
            $product->image = $this->storeFile($item['image'], $product->id);
            $product->save();
        }
    }

    public function storeFile($fileUrl, $fileName)
    {
        $content = file_get_contents($fileUrl);
        $extension = substr($fileUrl, strrpos($fileUrl, '.') + 1);
        $name = $fileName . '.' . $extension;
        Storage::put("public/products/$name", $content);

        return "/storage/products/$name";
    }

    public function parse($startPage = 1, $count = 1)
    {
        $parsingResource = new ParsingResource();

        for ($i = $startPage; $i < $startPage + $count; $i++) {
            $this->products = $parsingResource->parse($i);
            $this->store();
        }
    }
}
