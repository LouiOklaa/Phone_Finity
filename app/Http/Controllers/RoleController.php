<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:BenutzerRollen|RollenHinzufügen|RollenBearbeiten|RollenLöschen|AlleRollenAnzeigen', ['only' => ['index']]);
        $this->middleware('permission:RollenHinzufügen', ['only' => ['create','store']]);
        $this->middleware('permission:AlleRollenAnzeigen|RollenAnzeigen', ['only' => ['show']]);
        $this->middleware('permission:RollenBearbeiten', ['only' => ['edit','update']]);
        $this->middleware('permission:RollenLöschen', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = Role::paginate(10);
        return view('roles.show_roles',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $permission = Permission::get();
        return view('Roles.add',compact('permission'));
    }

    /**
     * Display the specified resource.
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|unique:roles,name',
            'permission' => 'required'

        ],[

            'name.required' => 'Bitte geben Sie den Berechtigungsnamen ein',
            'name.unique' => 'Der Berechtigungsname existiert bereits',
            'permission.required' => 'Bitte geben Sie mindestens eine Berechtigung an'

        ]);


        $role = Role::create(['name' => $request->input('name'), 'guard_name' => 'web']);
        $role->syncPermissions(Permission::whereIn('id', $request->input('permission'))->pluck('name')->toArray());

        session()->flash('Add' , 'Die Berechtigung wurde erfolgreich hinzugefügt');
        return redirect()->route('rollen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")->where("role_has_permissions.role_id",$id)->get();
        return view('Roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('Roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ],[

            'name.required' => 'Bitte geben Sie den Berechtigungsnamen ein',
            'permission.required' => 'Bitte geben Sie mindestens eine Berechtigung an'

        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $permissions = Permission::whereIn('id', $request->input('permission'))->pluck('name')->toArray();
        $role->syncPermissions($permissions);

        return redirect()->route('rollen.index')
            ->with('Edit', 'Die Berechtigung wurde erfolgreich geändert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::table("roles")->where('id',$id)->delete();

        session()->flash('Delete' , 'Die Berechtigung wurde erfolgreich gelöscht');
        return redirect()->route('rollen.index');
    }
}
