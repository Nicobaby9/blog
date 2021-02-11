<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\WebSetting;
use File;
use View;

class WebSettingController extends Controller
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
        $web = WebSetting::all()->first();
        
        return view('admin.web-setting.index', compact('web'));
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
    public function update(Request $request, $id)
    {
        $web = WebSetting::findOrFail($id);

        $this->validate($request, [
            'web_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('web_logo')) {
            $file = $request->file('web_logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/storage/web-logo/');
            $file->move($destinationPath, $filename);
            $insert['web_logo'] = "$filename";
            $image = File::delete($destinationPath . $web->web_logo); 

            $web_data = [
                'web_name' => $request->web_name,
                'web_desc' => $request->web_desc,
                'web_story' => $request->web_story,
                'web_vision' => $request->web_vision,
                'web_quotes' => $request->web_quotes,
                'web_quotes_creator' => $request->web_quotes_creator,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'web_logo' => $filename,
            ];

            $web->update($web_data);

            return redirect(route('web-setting.index'))->with(['success' => 'Berhasil mengubah settingan web']);
        }else {
            $web_data = [
                'web_name' => $request->web_name,
                'web_desc' => $request->web_desc,
                'web_story' => $request->web_story,
                'web_vision' => $request->web_vision,
                'web_quotes' => $request->web_quotes,
                'web_quotes_creator' => $request->web_quotes_creator,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
            ];

            $web->update($web_data);

            return redirect(route('web-setting.index'))->with(['success' => 'Berhasil mengubah settingan web']);
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
