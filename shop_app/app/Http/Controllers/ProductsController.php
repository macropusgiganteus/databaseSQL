<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->input('scale')) && empty($request->input('vendor'))) {
            $products = Products::all()->toArray();
        } elseif (!empty($request->input('scale')) && empty($request->input('vendor'))) {
            $products = Products::all()
                ->where('productScale', $request->input('scale'))->toArray();
        } elseif (empty($request->input('scale')) && !empty($request->input('vendor'))) {
            $products = Products::all()
                ->where('productVendor', $request->input('vendor'))->toArray();
        } else {
            $products = Products::all()
                ->where('productScale', $request->input('scale'))
                ->where('productVendor', $request->input('vendor'))->toArray();
        }
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
        $this->validate($request, ['productCode' => 'required',
            'productName' => 'required',
            'productLine' => 'required',
            'productScale' => 'required',
            'productVendor' => 'required',
            'productDescription' => 'required',
            'quantityInStock' => 'required',
            'buyPrice' => 'required',
            'MSRP' => 'required',
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
        ]);
        $product->timestamps = false;
        $product->save();

        return redirect()->route('product.index')->with('success', 'New products have been added.');
    }

    public function destroy($productCode)
    {
        $product = Products::where('productCode', $productCode)->first();
        $product->delete();
        return redirect()->route('product.index')->with('success', 'This products have been deleted!');
    }

    public function update(Request $request, $productCode)
    {
        $this->validate($request, ['productCode' => 'required',
            'productName' => 'required',
            'productLine' => 'required',
            'productScale' => 'required',
            'productVendor' => 'required',
            'productDescription' => 'required',
            'quantityInStock' => 'required',
            'buyPrice' => 'required',
            'MSRP' => 'required',
        ]);
        $product = Products::where('productCode', $productCode)->first();
        $product->productName = $request->get('productName');
        $product->productLine = $request->get('productLine');
        $product->productScale = $request->get('productScale');
        $product->productVendor = $request->get('productVendor');
        $product->productDescription = $request->get('productDescription');
        $product->quantityInStock = $request->get('quantityInStock');
        $product->buyPrice = $request->get('buyPrice');
        $product->MSRP = $request->get('MSRP');
        $product->timestamps = false;
        $product->save();
        return redirect('/');

    }

    public function edit($productCode)
    {
        $product = Products::where('productCode', $productCode)->first();

        return view('product.edit', compact('product', 'productCode'));
    }
}
