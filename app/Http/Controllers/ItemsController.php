<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\Listname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $listnames = Listname::all();
        $categories = Category::all();
        
        return view("items/index", compact("categories"));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         Validator::make($request->all(), [
            "name" => ["required", "string"],
            "nota" => ["required", "string"],
            "categoria" => "required",
        ]);  

        Item::create([
            "name"=> $request->name,
            "note"=>$request->nota,
            "category_id" => $request->categoria

          
        ]);
        return back();
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
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
            
        if ($item) {
            $item= Item::destroy($id);
            return back();
        } else {
            return back();
        }
    }
}
