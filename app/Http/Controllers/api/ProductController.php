<?php

namespace App\Http\Controllers\api ;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Models\Product;
use App\Http\Resources\ProductResources;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function register()
    {
        //
    }


    public function store(Request $request)
    {
//        echo $request->input('name'); exit;
        //create ney product
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();
        return new ProductResources($product);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * @param $id
     */
    public function destroy($id)
    {
        $product = User::find($id);
//        echo $id;
//        print_r($product);
        if ($product) {
            $product->delete();
            $data = [
                'status' => '1',
                'msg' => 'success'
            ];
        } else {
            $data = [
                'status' => '0',
                'msg' => 'fail'
            ];
        }
        return new ProductResources($data);
    }
}
