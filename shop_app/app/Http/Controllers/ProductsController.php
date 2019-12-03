<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\StockIn;

class ProductsController extends Controller
{
    public function index(){
        $products = Products::all()->toArray();
        $productScale = Products::select('productScale')->distinct()->get();
        $productVendor = Products::select('productVendor')->distinct()->get();
        return view('product.index')
            ->with(compact('products'))
            ->with(compact('productScale'))
            ->with(compact('productVendor'));
    }

    public function create()
    {   
        return view('product.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [ 'productCode' => 'required',
            'productName' => 'required',
            'productLine' => 'required',
            'productScale' => 'required',
            'productVendor' => 'required',
            'productDescription' => 'required',
            'quantityInStock' => 'required',
            'buyPrice' => 'required',
            'MSRP' => 'required'
            ]);
        $product = new Products([
            'productCode' => $request->get('productCode'),
            'productName' => $request->get('productName'),
            'productLine' => $request->get('productLine'),
            'productScale' => $request->get('productScale'),
            'productVendor' => $request->get('productVendor'),
            'productDescription' => $request->get('productDescription'),
            'quantityInStock' => $request->get('quantityInStock'),
            'buyPrice' => $request->get('buyPrice'),
            'MSRP' => $request->get('MSRP'),
            ] );
        $product->timestamps = false;
        $product->save();

        return redirect()->route('product.index')->with('success','New products have been added.');
    }
    
    public function destroy($productCode)
    {   
        $product = Products::where('productCode', $productCode);
        $product->delete();
        return redirect()->route('product.index')->with('success','This products have been deleted!');
    }
}


 
