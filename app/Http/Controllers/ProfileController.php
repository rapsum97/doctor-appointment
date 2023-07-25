<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index() {
        return view('profile.index');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'pincode' => 'required',
        ],
        [
            'name.required' => 'Full Name Field is Required',
            'gender.required' => 'Gender Field is Required',
            'address.required' => 'Address Field is Required',
            'country.required' => 'Country Field is Required',
            'city.required' => 'City Field is Required',
            'pincode.required' => 'Pincode Field is Required',
        ]);

        // User Update
        User::where('id', auth()->user()->id)->update(['name' => $request->name, 'phone' => $request->phone, 'gender' => $request->gender, 'address' => $request->address, 'country' => $request->country, 'city' => $request->city, 'pincode' => $request->pincode, 'education' => $request->education, 'description' => $request->description]);

        return redirect()->back()->with('message', 'Your Profile Details has been Updated Successfully!');
    }

    public function profileImage(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:5000',
        ],
        [
            'image.required' => 'Image Field is Required',
            'image.image' => 'Only Image is Accepted',
            'image.mimes' => 'Only Listed Image Extensions are Accepted',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $destination = public_path('/images/users');
            $image->move($destination, $imageName);

            // User Update
            User::where('id', auth()->user()->id)->update(['image' => $imageName]);

            return redirect()->back()->with('message', 'Your Profile Picture has been Updated Successfully!');
        }
    }
}
