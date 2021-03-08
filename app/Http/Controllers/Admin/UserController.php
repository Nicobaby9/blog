<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\{User, UserProfile, WebSetting};
use File;
use View;

class UserController extends Controller
{
    public function __construct() {
        $web = WebSetting::all()->first();

        View::share('web', $web);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:99',
            'email' => 'required|email',
            'role' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000'
        ]);

        if($request->input('password')) {
            $password = Hash::make($request->password);
        }else {
            if($request->role == 0) {
                $password = bcrypt('author');
            }else {
                $password = bcrypt('administrator');
            }
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/user-photo/');
            $file->move($destinationPath, $filename);
            $insert['photo'] = "$filename";

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'role' => $request->role,
                'photo' => $filename,
            ]);

            $user->profile()->create([
                'user_id' => $user->id,
                'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'username' => '@username',
                'headline' => 'Your Headline',
                'facebook' => 'Your Facebook',
                'instagram' => '@instagram',
                'twitter' => '@twitter',
                'phone' => 'Your Phone Number'
            ]);

            return redirect(route('user.index'))->with(['success' => 'Berhasil mebuat user baru']);
        }else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'role' => $request->role,
                'photo' => 'profile.png',
            ]);

            $user->profile()->create([
                'user_id' => $user->id,
                'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'username' => '@username',
                'headline' => 'Your Headline',
                'facebook' => 'Your Facebook',
                'instagram' => '@instagram',
                'twitter' => '@twitter',
                'phone' => 'Your Phone Number'
            ]);

            return redirect(route('user.index'))->with(['success' => 'Berhasil mebuat user baru']);
        }
        
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

        return view('admin.user.edit', compact('user'));
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

        $this->validate($request, [
            'role' => 'required',
        ]);

        $user_data = [
            'role' => $request->role,
        ];

        $user->update($user_data);

        return redirect(route('user.index'))->with(['success' => 'Data user berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $profile = UserProfile::where('user_id', $user->id)->first();

        $user->delete();
        $profile->delete();

        return redirect(route('user.index'))->with(['success' => 'Berhasil mem-banned / membekukan user.']);
    }

    public function bannedUser() {
        $users = User::onlyTrashed()->paginate(30);

        return view('admin.user.banned-user', compact('users'));
    }

    public function unban($id) {
        $user = User::withTrashed()->where('id', $id)->first();
        $profile = UserProfile::withTrashed()->where('user_id', $user->id)->first();

        $user->restore();
        $profile->restore();

        return redirect(route('user.index'))->with(['success' => 'Berhasil mengembalikan user yang dibekukan / dibanned, silahkan cek di user list.']);
    }

    public function clean($id) {
        $user = User::withTrashed()->where('id', $id)->first();
        $profile = UserProfile::withTrashed()->where('user_id', $user->id)->first();

        // Delete Image
        $destinationPath = public_path('/uploads/user-photo/');

        if($user->photo != 'profile.png') {
            $image = File::delete($destinationPath . $user->photo); 
        }

        $user->forceDelete();
        $profile->forceDelete();

        return redirect()->back()->with(['success' => 'Berhasil menghapus user secara permanen.']);
    }

    public function search(Request $request) {
        $users = User::where('name', $request->search)->orWhere('name', 'like', '%'.$request->search.'%')->latest()->paginate(15);

        return view('admin.user.index', compact('users'));
    }

    public function bannedSearch(Request $request) {
        $users = User::onlyTrashed()->where('name', $request->search)->orWhere('name', 'like', '%'.$request->search.'%')->latest()->paginate(15);

        return view('admin.user.banned-user', compact('users'));
    }
}
