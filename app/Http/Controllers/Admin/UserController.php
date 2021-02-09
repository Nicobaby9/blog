<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\User;
use File;

class UserController extends Controller
{
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
            $destinationPath = public_path('/storage/user-photo/');
            $file->move($destinationPath, $filename);
            $insert['photo'] = "$filename";

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'role' => $request->role,
                'photo' => $filename,
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
            'name' => 'required|min:3|max:99',
            'role' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000'
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

            if($request->input('password')) {
                $user_data = [
                    'name' => $request->name,
                    'password' => bcrypt($request->password),
                    'role' => $request->role,
                    'photo' => $filename,
                ];
            }else {
                $user_data = [
                    'name' => $request->name,
                    'role' => $request->role,
                    'photo' => $filename,
                ];
            }

            $user->update($user_data);

            return redirect(route('user.index'))->with(['success' => 'Data user berhasil diupdate']);
        }else {
            if($request->input('password')) {
                $user_data = [
                    'name' => $request->name,
                    'password' => bcrypt($request->password),
                    'role' => $request->role,
                ];
            }else {
                $user_data = [
                    'name' => $request->name,
                    'role' => $request->role,
                ];
            }

            $user->update($user_data);

            return redirect(route('user.index'))->with(['success' => 'Data user berhasil diupdate']);
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
        $user = User::findOrFail($id);

        // Delete Image
        $destinationPath = public_path('/storage/user-photo/');

        if($user->photo != 'profile.png') {
            $image = File::delete($destinationPath . $user->photo); 
        }

        $user->delete();

        return redirect(route('user.index'))->with(['success' => 'Data user berhasil dihapus.']);
    }
}
