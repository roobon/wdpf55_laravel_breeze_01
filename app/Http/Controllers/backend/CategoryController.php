<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['cats'] =  Category::All();
        return view('backend.category.index', $data);
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        
        $data = [ 'name'=>  $request->name];

      $model = new Category();       
       if($model->insert($data)){
            return redirect('category')->with('msg', 'Successfully Category Added');
        }
        //DB::table('categories')->insert($data);

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
        //
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
    public function destroy(string $id)
    {
        //
    }
}
