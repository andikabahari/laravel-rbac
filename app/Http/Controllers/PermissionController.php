<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Permission;
use App\Http\Requests\StorePermission;
use App\Http\Requests\UpdatePermission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('view-permission', Auth::user());

        $permissions = Permission::all();

        return view('permissions', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create-permission', Auth::user());

        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermission $request)
    {
        Gate::authorize('create-permission', Auth::user());

        $validated = $request->validated();

        $permission = new Permission;
        $permission->title = $validated['title'];
        $permission->save();

        $request->session()->flash('status', 'New permission added successfully!');

        return redirect()->route('permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('view-permission', Auth::user());

        $permission = Permission::findOrFail($id);

        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('edit-permission', Auth::user());

        $permission = Permission::findOrFail($id);

        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermission $request, $id)
    {
        Gate::authorize('edit-permission', Auth::user());

        $validated = $request->validated();

        $permission = Permission::findOrFail($id);
        $permission->title = $validated['title'];
        $permission->save();

        $request->session()->flash('status', 'A permission edited successfully!');

        return redirect()->route('permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete-permission', Auth::user());

        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions');
    }
}
