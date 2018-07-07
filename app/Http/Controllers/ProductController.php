<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Controllers\Base1Controller;
use App\Models\Product;

class ProductController extends Base1Controller
{
    public function __construct(){
        parent::__construct();

    }  

    public function index()
    {

        return new JsonResponse([
            'data' => Product::all(),
            'message' => 'get_all_product'
        ]);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {

        $p = json_decode($request->get('json'));

        foreach($p as $pp){

            $tt = Product::firstOrNew(
            ['id' => $pp->id],
            [
                'name'			=> $pp->name,
                'category_name' => $pp->category_name,
            ]);

            $tt->save();
        }
        /*$product = new Product();
        
        $product->name = $request->get('name');
        $product->category_name = $request->get('category_name');
        
        $product->save();*/

        return new JsonResponse([
            'data' => $p,
            'message' => 'created_product'
        ]);

    }

    public function show(Product $product)
    {
        return new JsonResponse([
            'data' => $product,
            'message' => 'get_product'
        ]);
    }


    public function edit(Product $product)
    {
        return 'edit';
    }

    public function update(Request $request, Product $product)
    {
      
        $product->name = $request->get('name');
        $product->category_name = $request->get('category_name');
        
        $product->save();

        return new JsonResponse([
            'data' => $product,
            'message' => 'update_product'
        ]);
        
    }

    public function delete(Product $product) 
    {
        return 'delete';
    }

    public function destroy(Product $product)
	{

        $product->delete();

        return new JsonResponse([
            'data' => $product,
            'message' => 'delete_product'
        ]);

        return 'destroy';
    }
    
    public function data()
	{
        return 'data';
    }


}
