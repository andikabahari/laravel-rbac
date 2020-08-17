<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Http\Requests\StoreItem;
use App\Http\Requests\UpdateItem;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('view-item', Auth::user());

        $items = Item::all();

        return view('items', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create-item', Auth::user());

        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItem $request)
    {
        Gate::authorize('create-item', Auth::user());

        $validated = $request->validated();

        $item = new Item;
        $item->name = $validated['name'];
        $item->description = $validated['description'];
        $item->save();

        $request->session()->flash('status', 'New item added successfully!');

        return redirect()->route('items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('view-item', Auth::user());

        $item = Item::findOrFail($id);

        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('edit-item', Auth::user());

        $item = Item::findOrFail($id);

        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItem $request, $id)
    {
        Gate::authorize('edit-item', Auth::user());

        $validated = $request->validated();

        $item = Item::findOrFail($id);
        $item->name = $validated['name'];
        $item->description = $validated['description'];
        $item->save();

        $request->session()->flash('status', 'An item edited successfully!');

        return redirect()->route('items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete-item', Auth::user());

        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items');
    }
}
