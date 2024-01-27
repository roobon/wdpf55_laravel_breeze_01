<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['products'] = Product::all();
       // dd($data);
        return view('backend.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['cats'] = Category::All();
        return view('backend.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validate = $request->validate([
            'name' => 'required | min:4',
            'description' => 'required | min:4',
            'price' => 'required|numeric',
            'category' => 'required',
            'photo' => 'mimes:jpg,jpeg,png',
       ]);

       $filename = time(). "." . $request->photo->extension();

       if($validate){
        // $input = $request->all();
        // $input['name'] = $request->input('name');
        // $input['description'] = $request->input('description');
        // $input['price'] = $request->input('price');
        // $input['category_id'] = $request->input('category');
        // $input['availibility'] = $request->input('availibility');
        // $input['tags'] = $request->input('tags');
        $data = [ 
            'name'=>  $request->name,
            'description'=>  $request->description,
            'price'=>  $request->price,
            'category_id'=>  $request->category, 
            'availibility'=>  $request->availibility,
            'tags' => $request->tags, 
            'image'=> $filename, 
        ];

        $model = new Product();       
         if($model->create($data)){
            $request->photo->move('images', $filename);    
            return redirect('product')->with('msg', 'Successfully Product Added');
          }
       }      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        $cats     = Category::all();     
        return view('backend.product.edit', compact('products', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('product')->with('msg', 'Successfully Deleted');
    }
}
