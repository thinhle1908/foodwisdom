<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request)
    {
        request()->validate([
            'image' => 'image',
            'name' => 'required|string|max:255',
            'phone' => 'alpha_num|nullable',
            'line1' => 'string|nullable',
            'line2' => 'string|nullable',
            'city' => 'string|nullable',
            'province' => 'string|nullable',
            'country' => 'string|nullable',
            'zipcode' => 'alpha_num|nullable',
        ]);
        $userProfile = Profile::where('user_id',Auth::user()->id)->first();
        $nameimg = $userProfile->image;
        if ($request->file('image') != null) {

            $image_path = "../public/images/user-profile//" . $userProfile->image;  // Value is not URL but directory file path
            //Delete image
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            //Move Image to forder and get name image
            $nameimg = $request->file('image')->hashName();
            $request->file('image')->move('images/user-profile', $nameimg);
        }
        $user = User::find(Auth::user()->id);
        $user->update([
            'name' => request('name')
        ]);
        $userProfile->update([
            'image' => $nameimg,
            'mobile' => request('phone'),
            'line1' => request('line1'),
            'line2' => request('line2'),
            'city' => request('city'),
            'province' => request('province'),
            'country' => request('country'),
            'zipcode' => request('zipcode')
        ]);
        
        return redirect('/user/profile');
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

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function profile()
    {
        $userProfile = Profile::where('user_id',Auth::user()->id)->first();
        if(!$userProfile){
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }
        $user = User::find(Auth::user()->id);
        return view('profile')->with('user',$user);
    }
}
