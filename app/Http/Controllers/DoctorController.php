<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Redirect;
use Auth;

class DoctorController extends Controller
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
        $users = User::latest()->where('role_id', '=', 2)->get();
        return view('admin.doctor.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();
        $image = (new User)->userAvatar($request);
        $data['image'] = $image;
        $data['password'] = bcrypt($request->password);
        $data['role_id'] = $request->role;
        unset($data['role']);
        User::create($data);

        return redirect()->back()->with('message', 'Doctor Details Has Been Added Successfully!');
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
        return view('admin.doctor.delete', compact('user'));
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
        return view('admin.doctor.edit', compact('user'));
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
        $this->validateUpdate($request, $id);
        $data = $request->all();
        $user = User::find($id);
        $data['image'] = $user->image;
        $data['password'] = $user->password;
        if ($request->hasFile('image')) {
            $image = (new User)->userAvatar($request);
            if ($user->image != '' && file_exists(public_path('images/users/'.$user->image))) {
                unlink(public_path('images/users/'.$user->image));
            }
            $data['image'] = $image;
        }
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $data['role_id'] = $request->role;
        unset($data['role']);
        $user->update($data);

        return redirect()->route('doctor.index')->with('message', 'Doctor Details Has Been Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->id == $id) {
            abort(401);
        }
        $user = User::find($id);
        $userDelete = $user->delete();
        if ($userDelete) {
            if ($user->image != '' && file_exists(public_path('images/users/'.$user->image))) {
                unlink(public_path('images/users/'.$user->image));
            }
        }

        return redirect()->route('doctor.index')->with('message', 'Doctor Account Has Been Deleted Successfully!');
    }

    public function validateStore($request) {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:8|max:25',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required|min:5|max:300',
            'country' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'phone' => 'required|numeric',
            'department' => 'required',
            'role' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,svg|max:5000',
            'description' => 'required|min:40|max:900'
        ]);
    }

    public function validateUpdate($request, $id) {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|max:25',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required|min:5|max:300',
            'country' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'phone' => 'required|numeric',
            'department' => 'required',
            'role' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,svg|max:5000',
            'description' => 'required|min:40|max:900'
        ]);
    }
}
