<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\{AdviceMail, WebSetting};
use View;

class AdviceMailController extends Controller
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
        $mails = AdviceMail::latest()->paginate(30);

        return view('admin.advice-mail.index', compact('mails'));
    }

    public function sendMail(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required|min:5|max:150',
            'message' => 'required|min:10'
        ]);

        $mail = AdviceMail::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with(['success' => 'Berhasil mengisim pesan.']);
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
        $mail = AdviceMail::findOrFail($id);

        return view('admin.advice-mail.show', compact('mail'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mail = AdviceMail::findOrFail($id);
        $mail->delete();

        return redirect()->back()->with(['success' => 'Berhasil menghapus pensan, silahkan cek di folder spam.']);
    }

    public function spam() {
        $mails = AdviceMail::onlyTrashed()->paginate(30);

        return view('admin.advice-mail.spam', compact('mails'));
    }

    public function restore($id) {
        $mail = AdviceMail::withTrashed()->where('id', $id)->first();
        $mail->restore();

        return redirect(route('mail.index'))->with(['success' => 'Berhasil mengembalikan pesan, silahkan cek di Kotak Masuk']);
    }

    public function clean($id) {
        $mail = AdviceMail::withTrashed()->where('id', $id)->first();
        $mail->forceDelete();

        return redirect()->back()->with(['success' => 'Berhasil menghapus pensan secara permanen.']);
    }
}
