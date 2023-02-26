<?php

namespace Modules\User\Http\Controllers;

use App\Services\ImageService;
use Modules\User\Entities\Role;
use Modules\User\Entities\User;
use App\Http\Controllers\BackendController;
use Modules\User\Http\Requests\UserStoreRequest;
use Modules\User\Http\Requests\UserUpdateRequest;

class UserController extends BackendController
{
    protected $imageService;
    private $filePath;
    /**
     * Create a new class instance.
     * @return null
     */
    public function __construct()
    {
        $this->data = [
            'pageHeading'   => "User Management",
            'metaTitle'     => "User list",
            'moduleName'    => "user",
            'pageRoute'     => "users",
            'status'        => _modelStatus()
        ];
        $this->imageService = new ImageService();
        $this->filePath   = 'uploads/images/users';
        ## List of permissions
        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-destroy', ['only' => ['destroy']]);
        $this->middleware('permission:user-change-status', ['only' => ['changeStatus']]);

        $this->permissionList['user'] = [
            'list',
            'create',
            'edit',
            'destroy',
            'change-status',
        ];
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\View view
     */
    public function index()
    {
        return view('user::users.index', $this->data);
    }

    /**
     * Display a listing of the resource using ajax call
     * @return \Modules\User\Entities\User datatable()
     */
    public function datatable()
    {
        return User::datatable();
    }


    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\View view
     */
    public function create()
    {
        $this->data['metaTitle'] = "Add a new user";

        ## Find role list
        $this->data['roles']        = Role::where(['status' => 1])->get()->pluck('name', 'id');

        return view('user::users.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Modules\User\Http\Requests\UserStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse back
     */
    public function store(UserStoreRequest $request)
    {

        try {
            ## Retrieve inputs from request
            $inputs = $request->only(['name', 'email', 'password', 'status']);

            ## Create new user
            $model = User::create($inputs);

            ## Upload image
            if ($request->hasFile('fileName')) {
                $options = ['srcFile' => $request->fileName, 'filePath' => $this->filePath, 'fileType' => 'png', 'dimension' => [120, 120], 'quality' => 100];
                $result = $this->imageService->upload($options);

                if ($result['status']) {
                    $model->touch();
                    $model->image()->create(['fileName' => $result['fileName']]);
                }
            }

            ## Sync with role
            $model->assignRole($request->role);
            _toast();
        } catch (\Throwable $th) {
            _toast('error', ucfirst($th->getMessage()));
            $model->delete();
        }

        return back();
    }

    /**
     * Show the specific resource
     * @param \Modules\User\Entities\User $user
     * @return \Illuminate\Contracts\View\View view
     */
    public function show(User $user)
    {
        $this->data['metaTitle'] = "User details";
        $this->data['user'] = $user;
        $this->data['avatar'] = $this->imageService->getAvatar($this->filePath, $user);
        return view('user::users.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param \Modules\User\Entities\User $id
     * @return \Illuminate\Contracts\View\View view
     */
    public function edit($id)
    {
        $this->data['metaTitle']    = "Edit information's";

        try {
            ## Find User
            $id = decrypt($id);
            $model                      = User::with('roles', 'image')->findOrFail($id);

            $this->data['model']        = $model;
            $this->data['selectedId']   = $model->firstRole ? $model->firstRole->id : 0;
            $this->data['avatar']       = $this->imageService->getAvatar($this->filePath, $model);

            ## Find role list
            $this->data['roles']        = Role::where(['status' => 1])->get()->pluck('name', 'id');

            return view('user::users.edit', $this->data);
        } catch (\Throwable $th) {
            _toast('error', ucfirst($th->getMessage()));
            return redirect()->route('admin.users.index');
        }
    }

    /**
     * Update the specified resource in storage.
     * @param \Modules\User\Http\Requests\UserUpdateRequest $request
     * @param \Modules\User\Entities\User $id
     * @return \Illuminate\Http\Response json
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {
            ## Find and update user
            $model                      = User::with('image')->findOrFail($id);
            $model->name                = $request->name;
            $model->email               = $request->email;
            $model->status              = $request->status;
            if (!empty($request->password)) {
                $model->password        = $request->password;
            }
            $model->save();

            ## Upload image
            if ($request->hasFile('fileName')) {
                ## Delete user existing image from database and storage
                $this->imageService->delete($model, $this->filePath);

                ## Set upload options
                $options = ['srcFile' => $request->fileName, 'filePath' => $this->filePath, 'fileType' => 'png', 'dimension' => [120, 120], 'quality' => 100];
                $result = $this->imageService->upload($options);
                ## Create new image
                if ($result['status']) {
                    $model->touch();
                    $model->image()->create(['fileName' => $result['fileName']]);
                }
            }

            ## Sync with role
            $model->syncRoles($request->role);
            _toast('success', 'Updated successfully');
        } catch (\Throwable $th) {
            _toast('error', ucfirst($th->getMessage()));
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param \Modules\User\Entities\User $id
     * @return \Illuminate\Http\Response json
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                User::destroy($id);
                return response()->json(_successResponse('Deleted'));
            }
        } catch (\Throwable $th) {
            return response()->json(_errorResponse('Delete'));
        }
    }

    /**
     * Change the status of the resource
     * @param  \Modules\User\Entities\User  $user
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(User $user)
    {
        try {
            if ($user) {
                $user->status = $user->status == 1 ? 0 : 1;
                $user->save();
                return response()->json(_successResponse('Status updated'));
            }
        } catch (\Throwable $th) {
            return response()->json(_errorResponse($th->getMessage()));
        }
    }
}
