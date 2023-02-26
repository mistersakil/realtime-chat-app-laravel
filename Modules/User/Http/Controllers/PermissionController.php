<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\User\Entities\Permission;
use App\Http\Controllers\BackendController;

class PermissionController extends BackendController
{
    /**
     * Create a new class instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->data = [
            'metaTitle'         => "Permission list",
            'pageHeading'       => "Permission Management",
            'moduleName'        => "permission",
            'pageRoute'         => "permissions",
            'status'            => _modelStatus()
        ];
        ## List of permissions
        $this->middleware('permission:permission-list', ['only' => ['index']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-destroy', ['only' => ['destroy']]);
        $this->middleware('permission:permission-change-status', ['only' => ['changeStatus']]);
        $this->permissionList['permission'] = [
            'list',
            'create',
            'edit',
            'destroy',
            'change-status'
        ];
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\View view
     */
    public function index()
    {

        return view('user::permissions.index', $this->data);
    }

    /**
     * Display a listing of the resource using ajax call
     * @return \Illuminate\Http\Response datatable
     */

    public function datatable()
    {
        return Permission::datatable();
    }


    /**
     * Generating dynamic permissions
     * @return \Illuminate\Contracts\View\View view
     */
    public function create()
    {
        try {
            $this->data['metaTitle']    = 'Generate permissions';
            $controllers = [];
            $filteredControllers = [];
            ## Loop through all available routes
            foreach (Route::getRoutes()->getRoutes() as $route) {
                $action = $route->getAction();
                if (array_key_exists('controller', $action)) {

                    $_action = explode('@', $action['controller']);
                    $controller = $_action[0];
                    $controllers[] = $controller;
                    $controllers = array_unique($controllers);
                }
            }
            ## Filter controllers from controller list
            foreach ($controllers as $key => $controller) {
                if (str_contains($controller, 'App\Http\Controllers\Backend')) {
                    $filteredControllers[] = $controller;
                }
                if (str_contains($controller, 'Modules')) {
                    $filteredControllers[] = $controller;
                }
            };

            ## Generate all permissions
            $availablePermissions = [];
            foreach ($filteredControllers as  $controller) {
                $controllerObject = new $controller();
                if (property_exists($controllerObject, 'permissionList') && !empty($controllerObject) && is_array($controllerObject->permissionList)) {
                    $availablePermissions  = [...$availablePermissions, ...$controllerObject->permissionList];
                }
            }

            ## Existing permissions
            $existingPermissions = Permission::pluck('name')->all();
            $this->data['existingPermissions'] = $existingPermissions;
            $this->data['availablePermissions'] = $availablePermissions;
            return view('user::permissions.create', $this->data);
        } catch (\Throwable $th) {
            return back()->with('error', ucfirst($th->getMessage()));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Modules\User\Http\Requests\RoleStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse back
     */
    public function store(Request $request)
    {
        try {
            foreach ($request->permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission]);
            }
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
    public function show(Permission $permission)
    {

        return view('user::show');
    }
}