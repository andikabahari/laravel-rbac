<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Permission;
use App\Http\Requests\StoreRole;
use App\Http\Requests\UpdateRole;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('view-role', Auth::user());

        $roles = Role::all();

        return view('roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create-role', Auth::user());

        $permissions = Permission::all();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {
        Gate::authorize('create-role', Auth::user());

        $validated = $request->validated();

        $role = new Role;
        $role->title = $validated['title'];
        $role->description = $validated['description'];
        $role->save();
        $role->permissions()->attach($validated['permissions']);
        $role->save();

        $request->session()->flash('status', 'New role added successfully!');

        return redirect()->route('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('view-role', Auth::user());

        $role = Role::findOrFail($id);

        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('edit-role', Auth::user());

        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRole $request, $id)
    {
        Gate::authorize('edit-role', Auth::user());

        $validated = $request->validated();

        $role = Role::findOrFail($id);
        $role->title = $validated['title'];
        $role->description = $validated['description'];
        $role->permissions()->sync($validated['permissions']);
        $role->save();

        $request->session()->flash('status', 'A role edited successfully!');

        return redirect()->route('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete-role', Auth::user());

        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles');
    }
}
