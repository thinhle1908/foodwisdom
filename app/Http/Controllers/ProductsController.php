<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products =  Product::where('visible', 1)->get();
        return view('index')->with('products', $products);
    }

    public function getProductByID($id)
    {
        $product =  Product::find($id);
        return view('product-details')->with('product', $product);
    }
    public function search()
    {
        if (isset($_GET['search'])) {
            $keyword = $_GET['search'];
            $products = Product::where('product_name', 'like', "%$keyword%")->orWhere('description', 'like', "%$keyword%")->where('visible', 1)->get();
            return view('index')->with('products', $products);
        } else {
            abort(403);
        }
    }
    public function adminindex()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('adminProduct')->with('products', $products);
    }
    public function create()
    {
        $categories = Category::all();
        return view('adminAddProduct')->with('categories', $categories);
    }
    public function store(Request $request)
    {
        request()->validate([
            'product_name' => 'bail|required|string|max:255',
            'price' => 'bail|required|numeric',
            'image' => 'image|required',
            'qty' => 'required|numeric',
            'description' => 'bail|required|string',
            'visible' => 'required|numeric',
            'arr_category' => 'required|array'
        ]);
        //Move Image to forder and get name image
        $nameimg = $request->file('image')->hashName();
        $request->file('image')->move('images', $nameimg);
        //save product
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->image = $nameimg;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->save();
        //save categories

        $arr_category = $request->input('arr_category');
        $last_Product = Product::orderBy('id', 'desc')->take(1)->get();
        $id_last_product = $product->id;
        $categoryproductcontroller = new CategoryProductController();
        foreach ($arr_category as $key => $value) {
            $categoryproductcontroller->store($request, $id_last_product, $value);
        }
        //save in db

        return redirect()->back()->withErrors(['msg' => 'Sucessfully']);
    }
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $categories = Category::all();
        $category_id_by_product = [];
        foreach ($product->categories as $category) {
            array_push($category_id_by_product, $category->id);
        }
        return view('adminEditProduct')->with('categories', $categories)->with('product', $product)->with('category_id', $category_id_by_product);
    }
    public function update($id, Request $request)
    {
        request()->validate([
            'product_name' => 'bail|required|string|max:255',
            'price' => 'bail|required|numeric',
            'image' => 'image',
            'qty' => 'required|numeric',
            'description' => 'bail|required|string',
            'visible' => 'required|numeric',
            'arr_category' => 'required|array'
        ]);
        $product = Product::find($id);
        $nameimg = $product->image;
        //Delete Image
        if ($request->file('image') != null) {

            $image_path = "../public/images//" . $product->image;  // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            //Move Image to forder and get name image
            $nameimg = $request->file('image')->hashName();
            $request->file('image')->move('images', $nameimg);
        }
        $product->update([
            'product_name' => request('product_name'),
            'price' => request('price'),
            'image' => $nameimg,
            'qty' => request('qty'),
            'description' => request('description'),
            'visible'=>request('visible')
        ]);
        //delete old category
        $id_product = $product->id;
        $categoryproductcontroller = new CategoryProductController();
        $categoryproductcontroller->destroyByID($id_product, $request);
        //save categories

        $arr_category = $request->input('arr_category');
        $last_Product = Product::orderBy('id', 'desc')->take(1)->get();
        $id_last_product = $product->id;
        $categoryproductcontroller = new CategoryProductController();
        foreach ($arr_category as $key => $value) {
            $categoryproductcontroller->store($request, $id_last_product, $value);
        }
        return ProductsController::adminindex();
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $success = $product->update([
            'visible' => 0
        ]);
        return ProductsController::adminindex();
    }
}
