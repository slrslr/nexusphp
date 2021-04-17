<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $result = $this->user->getList($request->all());
        $resource = UserResource::collection($result);
        return success('user list', $resource);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {
        $rules = [
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:40',
            'password_confirmation' => 'required|string|same:password'
        ];
        $request->validate($rules);
        $result = $this->user->store($request->all());
        $resource = new UserResource($result);
        return success('user store', $resource);
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

    public function resetPassword(Request $request)
    {
        $rules = [
            'username' => 'required|string|exists:users',
            'password' => 'required|string|min:6|max:40',
            'password_confirmation' => 'required|same:password',
        ];
        $request->validate($rules);
        $result = $this->user->resetPassword($request->username, $request->password, $request->password_confirmation);
        $resource = new UserResource($result);
        return success('user reset password', $resource);
    }
}
