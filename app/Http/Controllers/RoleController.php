<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::all();
        return view('roles.list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        Role::create($request->only(['name', 'persian_name']));
        return back()->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param role $role
     * @return Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param role $role
     * @return View
     */
    public function edit(role $role): View
    {
        $permissions = Permission::all();
        $role = $role->load('permissions');
        return view('roles.edit', compact('permissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $role->update($request->only(['name', 'persian_name']));
        $role->refreshPermissions($request->permissions);
        return back()->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param role $role
     * @return Response
     */
    public function destroy(role $role)
    {
        //
    }
}
