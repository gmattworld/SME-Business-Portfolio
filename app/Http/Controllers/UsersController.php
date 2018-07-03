<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $users = User::orderBy('name','desc')->paginate(10);
        $allusers = User::all();
        return view('users.index')->with(['users'=> $users, 'allusers'=> $allusers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/users')->with('error', 'Unauthorized Page!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'full_name' => 'required',
            'email' => 'required'
        ]);

        $user = new User;
        $user->name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->password =  bcrypt('password');
        $user->created_by =  auth()->user()->id;
        $user->isActive = true;
        $user->profile_pics = 'avatar.jpg';
        $user->department_id = 0;
        $user->designation_id = 0;
        $user->role_id = 0;
        $user->save();

        return redirect('/users')->with('success','User Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $created_by = User::find($user->created_by);
        $params = ['user' => $user, 'created_by' => $created_by];
        return view('users.show')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $users = User::orderBy('name','desc')->paginate(10);
        $param = ['user' => $user, 'users' => $users];
        return view('users.edit')->with($param);
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
        $this->validate($request,[
            'full_name' => 'required',
            'email' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->save();

        return redirect('/users')->with('success','User Information Updated!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function resetpass(Request $request, $id)
     { 
         $user = User::find($id);
         $user->password = bcrypt('password');
         $user->save();
 
         return redirect('/users')->with('success','User Password Resetted!');
     }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enable(Request $request, $id)
    { 
        $user = User::find($id);
        $user->isActive = true;
        $user->save();

        return redirect('/users')->with('success','User has been Enabled!');
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable(Request $request, $id)
    { 
        $user = User::find($id);
        $user->isActive = false;
        $user->save();

        return redirect('/users')->with('success','User has been Disabled!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::Find($id);
        $user->delete();
        return redirect('/users')->with('success', 'User Deleted!');
    }

    public function changepassword()
    {
        $user = auth()->user()->id;
        return view('users.changepass')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function savechangepwd(Request $request, $id)
    { 
        $this->validate($request,[
            'oldpassword' => 'required',
            'npassword' => 'required',
            'cpassword' => 'required'
        ]);

        $pass = $request->input('oldpassword');
        $newpass = $request->input('npassword');
        $newpassconfirm = $request->input('cpassword');

        if($newpass === $newpassconfirm){
            $user = User::find($id);
            if(Hash::check($pass, auth()->user()->password)){
                $user->password = bcrypt($newpass);
                $user->save();
                return redirect('/dashboard')->with('success','User Password Changed!');
            } else {
                return redirect('/changepassword')->with(['error'=>'Incorrect Old password, Try again!','user' => auth()->user()->id]);
            }
        } else {
            return redirect('/changepassword')->with(['error'=>'Password Provided does not match!','user' => auth()->user()->id]);
        }      
        
    }

    public function profile()
    {
        return view('users.profile');
    }
}