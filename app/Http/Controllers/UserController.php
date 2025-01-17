<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Benutzer|BenutzerHinzufügen|BenutzerBearbeiten|BenutzerLöschen|AlleProfileAnzeigen', ['only' => ['index']]);
        $this->middleware('permission:BenutzerHinzufügen', ['only' => ['store']]);
        $this->middleware('permission:BenutzerBearbeiten', ['only' => ['edit' , 'update']]);
        $this->middleware('permission:BenutzerLöschen', ['only' => ['destroy']]);
        $this->middleware('permission:AlleProfileAnzeigen|ProfilAnzeigen', ['only' => ['profile']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::paginate(10);
        $roles = Role::pluck('name','name')->all();
        return view('Users.show_users',compact('data' , 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $this->validate($request, [

            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role_name' => 'required',
            'status' => 'required'

        ],[

            'name.required' => 'Bitte geben Sie der Benutzernamen ein',
            'name.unique' => 'Dieser Benutzername existiert bereits',
            'email.required' => 'Bitte geben Sie die E-Mail-Adresse ein',
            'email.email' => 'E-Mail muss das Format haben : example@exampel.com',
            'email.unique' => 'Diese E-Mail existiert bereits',
            'password.required' =>'Bitte Passwort eingeben',
            'password.same' =>'Passwörter stimmen nicht überein',
            'role_name.required' =>'Bitte wählen Sie mindestens eine Berechtigung aus',
            'status.required' =>'Bitte wählen Sie ein Benutzerstatus  aus',

        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('role_name'));

        session()->flash('Add','Der Benutzer wurde erfolgreich hinzugefügt');
        return redirect()->route('benutzer.index');
    }

    /**
     * Display the specified resource.
     */

    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('Users.edit',compact('user','roles','userRole'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function update(Request $request)
    {
        $id = $request->id;
        $this->validate($request, [

            'name' => 'required|unique:users,name,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|same:confirm-password',
            'role_name' => 'required'

        ],[

            'name.required' => 'Bitte geben Sie der Benutzernamen ein',
            'name.unique' => 'Dieser Benutzername existiert bereits',
            'email.required' => 'Bitte geben Sie die E-Mail-Adresse ein',
            'email.email' => 'E-Mail muss das Format haben : example@exampel.com',
            'email.unique' => 'Diese E-Mail existiert bereits',
            'password.required' =>'Bitte Passwort eingeben',
            'password.same' =>'Passwörter stimmen nicht überein',
            'role_name.required' =>'Bitte wählen Sie mindestens eine Berechtigung aus',

        ]);

        $input = $request->all();
        if(!empty($input['password'])){

            $input['password'] = Hash::make($input['password']);

        }

        else{

            $input = array_except($input,array('password'));

        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('role_name'));

        session()->flash('Edit','Der Benutzer wurde erfolgreich geändert');
        return redirect()->route('benutzer.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request)
    {
        User::find($request->id)->delete();

        session()->flash('Delete','Der Benutzer wurde erfolgreich gelöscht');
        return redirect()->route('benutzer.index');
    }

    public function profile ($id){

        $user = User::find($id);
        $role = Role::where('name' , '=' , Auth::user()->role_name)->first();
        return view('Users.profile',compact('role' , 'user'));


    }

}
