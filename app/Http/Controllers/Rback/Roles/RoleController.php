<?php

namespace App\Http\Controllers\Rback\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRole;
// use App\Models\Role;
use JavaScript;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;


class RoleController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return auth()->user()->role();
        return \View::make('Rback.Roles.roles-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('Rback.Roles.role-create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {
        $validatedData = $request->validated();

        Role::create([
            'name' => $validatedData['role'],
            'guard_name' => 'web',

        ]);

        return \response()->json(['status'=>'true' , 'message'=>'Role added successfully' ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // **************** get all data in datatable **************

    public function datatable()
    {
        return \response()->json(Role::all() , 200);
    }

    // ************************ select2 roles ******************

    public function select2(Request $request)
    {
        return response()->json(Role::where('name','like',"%$request->searchTerm%")->get(['id' , 'name']));

    }

       // ***************************** assign permissions to role *****************

    public function assignPermission($id)
    {
        $roleName = Role::find($id);
        // return $id;
        $role = Role::findByName($roleName->name)->permissions;
        // return $role;
        JavaScript::put([
            'rolePermissions' => $role,
        ]);
        $roleId = $id;
        return \view('Rback.Roles.role-permissions' , compact('roleId'));

    }

    // ***************************** assign permission to role **************

    public function assignPermissionToRole(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            'role' => 'required',
            'permission' => 'required',
            'status' => 'required',
        ]);
        $role = Role::find($validateData['role']);
        $permission = Permission::find($validateData['permission']);
        if($validateData['status'] == 'checked'){
        $role->givePermissionTo($validateData['permission']);
        // $permission->assignRole($role->name);
        return 'give permission';

        }else{
            // $permission->removeRole($role->name);
            $role->revokePermissionTo($validateData['permission']);
            return 'revoke permission';
        }




        return $role;

    }
}
