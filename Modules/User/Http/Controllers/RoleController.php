<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Modules\User\Entities\Role;
use Modules\User\Entities\Permission;
use App\Http\Controllers\BackendController;
use Modules\User\Http\Requests\RoleStoreRequest;

class RoleController extends BackendController
{
    /**
     * Create a new class instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data = [
            'metaTitle'         => "Role list",
            'pageHeading'       => "Role Management",
            'moduleName'        => "role",
            'pageRoute'         => "roles",
            'status'            => _modelStatus()
        ];
        ## List of permissions
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-destroy', ['only' => ['destroy']]);
        $this->middleware('permission:role-change-status', ['only' => ['changeStatus']]);
        $this->middleware('permission:role-store-permissions', ['only' => ['syncPermissions', 'syncPermissionsStore']]);
        $this->permissionList['role'] = [
            'list',
            'create',
            'edit',
            'destroy',
            'change-status',
            'set-permissions'
        ];
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\View view
     */
    public function index()
    {

        return view('user::role.index', $this->data);
    }

    /**
     * Display a listing of the resource using ajax call
     * @return \Illuminate\Http\Response datatable
     */

    public function datatable()
    {
        return Role::datatable();
    }


    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\View view
     */
    public function create()
    {
        $this->data['metaTitle']    = 'Create a new role';

        return view('user::role.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Modules\User\Http\Requests\RoleStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse back
     */
    public function store(RoleStoreRequest $request)
    {
        try {
            ## Retrieve inputs from request
            $inputs = $request->only(['name', 'guard_name', 'status']);
            ## Create new user
            $model = Role::create($inputs);
            ## Create new note
            $model->note()->create([
                'details' => $request->details,
            ]);
            _toast();
        } catch (\Throwable $th) {
            _toast('error', ucfirst($th->getMessage()));
        }
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return \Illuminate\Contracts\View\View view
     */
    public function show(Role $role)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param \Modules\User\Entities\Role $id
     * @return \Illuminate\Contracts\View\View view
     */
    public function edit($id)
    {
        $this->data['metaTitle']        = "Edit role information's";
        $id = decrypt($id);
        try {
            $this->data['model']        = Role::with('note')->findOrFail($id);
            return view('user::role.edit', $this->data);
        } catch (\Throwable $th) {
            _toast('error', ucfirst($th->getMessage()));
            return redirect()->route('admin.role.index');
        }
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \Modules\User\Entities\Role $id
     * @return \Illuminate\Http\RedirectResponse back
     */
    public function update(Request $request, $id)
    {

        try {
            ## Update role info
            $model                      = Role::findOrFail($id);
            $model->name                = $request->name;
            $model->status              = $request->status ?? $model->status;
            $model->save();

            ## Update role note details
            if (empty($request->details)) {
                $model->note()->delete();
            } else {
                $model->note()->count()
                    ? $model->note()->update(['details' => $request->details])
                    : $model->note()->create(['details' => $request->details]);
            }

            _toast('success', 'Updated successfully');
        } catch (\Throwable $th) {
            _toast('error', ucfirst($th->getMessage()));
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param \Modules\User\Entities\Role $id
     * @return \Illuminate\Http\RedirectResponse back
     */
    public function destroy($id)
    {
        try {
            $model = Role::findOrFail($id);
            ## Delete role notes
            $model->note()->delete();
            ## Delete role 
            $model->delete();
            return response()->json(_successResponse('Deleted'));
        } catch (\Throwable $th) {
            return response()->json(_errorResponse('Delete'));
        }
    }

    /**
     * Change the status of the resource
     * @param  \Modules\User\Entities\Role  $model
     * @return \Illuminate\Http\JsonResponse json()
     */
    public function changeStatus(Role $model)
    {
        try {
            if ($model) {
                $model->status = $model->status == 1 ? 0 : 1;
                $model->save();
                return response()->json(_successResponse('Status updated'));
            }
        } catch (\Throwable $th) {
            return response()->json(_errorResponse($th->getMessage()));
        }
    }


    /**
     * Form of assigning permission to role 
     * @param  \Modules\User\Entities\Role  $model
     * @return \Illuminate\Contracts\View\View view
     */
    public function syncPermissions($model)
    {
        $this->data['metaTitle']            = "Assign permission to roles";
        try {
            ## Find role
            $id                             = decrypt($model);
            $model                          = Role::findOrFail($id);
            $this->data['model']            = $model;
            ## Find list of all permissions
            $this->data['permissions']      = Permission::pluck('name', 'id')->chunk(10)->all();

            ## Find list of all role permissions
            $this->data['role_permissions'] = $model->permissions()->pluck('name', 'id')->toArray();

            return view('user::role.sync_permissions', $this->data);
        } catch (\Throwable $th) {
            _toast('error', ucfirst($th->getMessage()));
            return redirect()->route('admin.roles.index');
        }
    }

    /**
     * Process of assigning permission to role 
     * @param  \Illuminate\Http\Request  $request
     * @param  \Modules\User\Entities\Role  $model
     * @return \Illuminate\Http\RedirectResponse back
     */
    public function syncPermissionsStore(Request $request, $model)
    {
        $this->data['metaTitle']            = "Assign permission to roles";
        try {
            ## Find role
            $id                             = decrypt($model);
            $model                          = Role::findOrFail($id);
            ## Assign or sync permission to role
            $model->syncPermissions($request->permissions);
            _toast('success', 'Permission updated successfully');
        } catch (\Throwable $th) {
            _toast('error', ucfirst($th->getMessage()));
        }
        return back();
    }
}