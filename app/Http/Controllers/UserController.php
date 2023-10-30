<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Models\User;

class UserController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return $this->success([
            'users' => $users,
        ],'Users list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->validate([
            'role_id'       => ['required','integer','exists:roles,id'],
            'email'         => ['required','string','email','unique:users,email'],
            'password'      => ['required','string','min:8'],
            'name'          => ['required','string','min:3','max:45'],
            'lastname'      => ['required','string','min:3','max:45'],
            'birthday'      => ['required','date'],
            'phone'         => ['required','string','min:7','max:15'],
            'id_number'     => ['required','string','min:3','max:45'],
            'address'       => ['required','string','min:10','max:100'],
            'gender'        => ['required','string','max:45'],
            'url_image'     => ['nullable','url'],
            'work_position' => ['nullable','string','max:45'],
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        return $this->success([
            'user'  => $user,
        ],'Registered User');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return $this->success([
            'user' => $user,
        ],'User details');
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

        $data = $request->validate([
            'role_id'       => ['nullable','integer','exists:roles,id'],
            'email'         => ['nullable','string','email'],
            'password'      => ['nullable','string','min:8'],
            'name'          => ['nullable','string','min:3','max:45'],
            'lastname'      => ['nullable','string','min:3','max:45'],
            'birthday'      => ['nullable','date'],
            'phone'         => ['nullable','string','min:7','max:15'],
            'id_number'     => ['nullable','string','min:3','max:45'],
            'address'       => ['nullable','string','min:10','max:100'],
            'gender'        => ['nullable','string','max:45'],
            'url_image'     => ['nullable','url'],
            'work_position' => ['nullable','string','max:45']
        ]);
        // return response()->json($data);

        if(isset($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }

        $user = User::findOrFail($id);
        $user->update($data);

        return $this->success([
            'user'  => $user,
        ],'Updated User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return $this->success([],'User Deleted ');
    }
}
