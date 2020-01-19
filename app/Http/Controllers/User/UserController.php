<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showAll(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);
        $data = $request->all();
        $data["password"] = bcrypt($request->password);
        $data["verified"] = User::UNVERIFIED_USER;
        $data["verification_token"] = User::generateVerificationCode();
        $data["admin"] = User::REGULAR_USER;
        return $this->showOne(User::create($data),201);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return $this->showOne($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,User $user)
    {
            $request->validate([
                'email'=>'nullable|email|unique:users,email,'.$user->id,
                'password'=>'min:6|confirmed',
                'admin'=>'in:'.User::ADMIN_USER.','.User::REGULAR_USER,
            ]);
            if($request->name){
                $user->name=$request->name;
            }
            if($request->email && $user->email != $request->email) {
                $user->verified = User::UNVERIFIED_USER;
                $user->verification_code = User::generateVerificationCode();
                $user->email->$request->email;
            }
            if($request->password){
                $user->password = bcrypt($request->password);
            }
            if($request->has('admin')){
                if(!$user->isVerified()){
                    return $this->errorResponse("Only verified users can modify the admin field",409);
                }
                $user->admin = $request->admin;

            }
            if(!$user->isDirty()){
                return $this->errorResponse("You need to specify a different value to update.",422);
            }
            $user->save();

        return $this->showOne($user);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return  $this->showOne($user);
    }
}
