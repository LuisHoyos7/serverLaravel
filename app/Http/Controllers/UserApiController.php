<?php

namespace App\Http\Controllers;

use App\Models\UserApi;
use Illuminate\Http\Request;
use App\Http\Resources\UserApiCollection;
use App\Http\Resources\UserApi as UserResource;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function index()
    {
        //con el metodo all se obtienen todos los registros del modelo 
        //UseApi, se retorna una nueva coleeccion de la clase UserApiCollection
       // return new UserApiCollection(UserApi::all());

        $users = UserApi::all();

        return response()->json($users,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //realizar la clase UserApiRequest para realizar la validacion en otra clase y el 
        //controlador quede mas legible
        $request->validate([
            'name'                  => 'required',
            'last_name'             => 'required',
            'identification_type'   => 'required',
            'identification_number' => 'required',
            'password'              => 'required'
        ]);

        //se crea el registro con la clase create de laravel, la inserción
        //masiva es permitida por la clase $fillable del modelo USerApi
        $userApi = UserApi::create($request->all());

        //se retorna una instancia del recurso UserApi 
        return (new UserResource($userApi))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserApi  $userApi
     * @return \Illuminate\Http\Response
     */
    public function show(UserApi $userApi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserApi  $userApi
     * @return \Illuminate\Http\Response
     */
    public function edit(UserApi $userApi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserApi  $userApi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserApi $userApi)
    {
        $userApi->update($request->all());

        return (new UserResource($userApi))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserApi  $userApi
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserApi $userApi)
    {
        $userApi->delete();

        return response()
            ->json(204);
    }
}
