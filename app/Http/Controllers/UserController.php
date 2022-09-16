<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //On récupère tous les Utilisateurs
        $users = User::all();

        // On transmet les Utilisateur à la vue
        return view("users.index", ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // On retourne la vue "/resources/views/users/create.blade.php"
        return view("users.edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // 1. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            "email" => 'required',
            "password" => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('users/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // 2. On enregistre les informations du User
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
        ]);

        // 3. On retourne vers tous les users: route("users.index")
        return redirect(route("users_index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("users_show", compact("users"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // 1. La validation
        // Les règles de validation pour "nom", "email", "password"
        $rules = [
            'name' => 'required',
            "email" => 'required',
            "password" => 'required',
        ];

        $this->validate($request, $rules);

        // 2. On met à jour les informations du User
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password
        ]);

        // 3. On affiche la liste des users modifié : route("users.index")
        return redirect(route("users_index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        // On supprime les informations du $user de la table "users"
        $user->delete();
        //$user_find = User::findOrFail(user.id);
        //$user_find->delete();

        // Redirection route "users.index"
        return redirect(route('users_index'));
    }
}
