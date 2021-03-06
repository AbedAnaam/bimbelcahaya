<?php

namespace App\Http\Controllers\Belakang;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestUser;
use Illuminate\Support\Facades\Storage;

use App\User;
// use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(function($request, $next){
    //         if(Gate::allows('manage-users')) return $next($request);
            
    //         abort(403, 'Anda tidak memiliki cukup hak akses');
    //     });
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = \App\User::paginate(10);
        $status = $request->get('status');
        if ($status) {
            $users = \App\User::where('status', $status)->paginate(10);
        } else {
            $users = \App\User::paginate(10);
        }

        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            if($status){
                $users = \App\User::where('email', 'LIKE', "%$filterKeyword%")
                    ->where('status', $status)
                    ->paginate(10);
            } else {
                $users = \App\User::where('email', 'LIKE', "%$filterKeyword%")
                    ->paginate(10);
            } 
        }

        return view('belakang.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('belakang.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestUser $request)
    {
        \Validator::make($request->all(),[
            "name"                  => "required|min:5|max:100",
            "username"              => "required|min:5|max:20",
            "roles"                 => "required",
            "phone"                 => "required|digits_between:10,14",
            "address"               => "required|min:20|max:200",
            "avatar"                => "required",
            "email"                 => "required|email",
            "password"              => "required",
            "password_confirmation" => "required|same:password"
        ])->validate();

        $new_user = new \App\User;

        $new_user->name = $request->get('name');
        $new_user->username = $request->get('username');
        $new_user->roles = json_encode($request->get('roles'));
        $new_user->address = $request->get('address');
        $new_user->phone = $request->get('phone');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));

        if ($request->file('avatar')) {
            $file = $request->file('avatar')->store('avatars', 'public');
            // $file = Storage::putFile('public/avatar');

            // dd($file);
            $new_user->avatar = $file;
        }

        // $path = Storage::putFile('avatar',
        //     $request->file('avatar'),
        // );
        // $new_user->avatar = $path;

        $new_user->save();
        // User::create($request->all());
        return redirect()->route('user.create')->with('status', 'User successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\User::findOrFail($id);
        return view('belakang.user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::findOrFail($id);
        return view('belakang.user.edit', ['user' => $user]);
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
        \Validator::make($request->all(), [
            "name"          => "required|min:5|max:100",
            "roles"         => "required",
            "phone"         => "required|digits_between:10,14",
            "address"       => "required|min:20|max:200",
        ])->validate();

        $user = \App\User::findOrFail($id);

        $user->name = $request->get('name');
        $user->roles = json_encode($request->get('roles'));
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->status = $request->get('status');

        if($request->file('avatar')){
            if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
                \Storage::delete('public/' . $user->avatar);
            }
            $file = $request->file('avatar')->store('avatars', 'public');
            // dd($file);
            $user->avatar = $file;
        }

        $user->save();

        return redirect()->route('user.edit', $user->id)->with('status', 'User successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('status', 'User successfully deleted!');
    }
}
