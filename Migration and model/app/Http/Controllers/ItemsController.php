<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // prints the csrf token
        //return response()->json(['csrf_token' => csrf_token()]); 

        $items = Items::all();
        return view('item', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('itemForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $record = $request->all();
        $items = new Items;
        $items->addItem($record);
        return redirect('/items')
            ->with('success', 'successfully inserted record');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $fetchedRecord = Items::where('id', $id)->first();
        return view('itemShow', $fetchedRecord->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fetchedRecord = Items::where('id', $id)->first();
        return view('itemForm', $fetchedRecord->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Items $itemsModel, $id)
    {
        $record = $request->all();
        $items = new Items;
        $items->updateItem($id, $record);
        return redirect('/items');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Items $itemsModel)
    {
        /*
        make this method functional
        1. complete the model method (delete a record by ID)
        2. redirect back to /items
        */
        return 'destroy';
    }
}