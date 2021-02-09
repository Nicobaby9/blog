<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\{User, UserProfile};
use File;

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
        $user = User::findOrFail($id);
        $profile = UserProfile::where('user_id', $user->id)->first();

        return view('user-profile.edit', compact('user', 'profile'));
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
        $user = User::findOrFail($id);
        $profile = UserProfile::where('user_id', $user->id)->first();

        $this->validate($request, [
            'name' => 'min:3|max:99',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000',
            'phone' => 'min:8|max:14|'
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/storage/user-photo/');
            $file->move($destinationPath, $filename);
            $insert['photo'] = "$filename";

            if($user->photo != 'profile.png') {
                $image = File::delete($destinationPath . $user->photo); 
            }

            $user_data = [
                'photo' => $filename,
            ];

            $user->update($user_data);

            return redirect()->back()->with(['success' => 'Data profil berhasil diupdate']);
        }else {
            if($request->input('password')) {
                $user_data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ];
                $profile_data = [
                    'username' => $request->username,
                    'bio' => $request->bio,
                    'headline' => $request->headline,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'twitter' => $request->twitter,
                    'phone' => $request->phone
                ];
            }else {
                $user_data = [
                    'name' => $request->name,
                    'email' => $request->email,
                ];
                $profile_data = [
                    'username' => $request->username,
                    'bio' => $request->bio,
                    'headline' => $request->headline,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'twitter' => $request->twitter,
                    'phone' => $request->phone
                ];
            }

            $user->update($user_data);
            $profile->update($profile_data);

            return redirect()->back()->with(['success' => 'Data user berhasil diupdate']);
        }
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
}
