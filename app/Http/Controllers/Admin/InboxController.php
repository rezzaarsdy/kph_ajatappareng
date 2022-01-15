<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inbox;
use File;
use DB;
use Illuminate\Support\Facades\Auth;
use Error;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inbox = Inbox::all();
        return view('admin.inbox.index', compact('inbox'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.kontak.index');
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
            'fullname' => 'required',
            'email' => 'email|required',
            'phone_number' => 'required',
            'subject' => 'required',
            'content' => 'required'
        ], [
            'fullname.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'phone_number.required' => 'Nomor Telepon harus diisi',
            'subject.required' => 'Subject harus diisi',
            'content.required' => 'Isi Pesan harus diisi',
        ]);

        DB::beginTransaction();
        try{
            $uuid = Uuid::uuid4()->getHex();
            $inbox = new Inbox;
            $inbox->uuid = $uuid;
            $inbox->fullname = $request->fullname;
            $inbox->email = $request->email;
            $inbox->phone_number = $request->phone_number;
            $inbox->subject = $request->subject;
            $inbox->content = $request->content;

            $inbox->save();
            DB::commit();

            return redirect()->route('beranda')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil',
                'f_msg' => 'Pesan Berhasil Dikirim',
            ]);
        } catch(Error $e){
            DB::rollBack();
            return redirect()->route('beranda')->with([
                'f_bg' => 'bg-danger',
                'f_title' => 'Tidak Berhasil.',
                'f_msg' => 'Pesan Tidak Berhasil Dikirim.',
            ]);
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
    public function destroy($uuid)
    {
        DB::beginTransaction();
        try{
            $inbox = Inbox::findOrFail($uuid);
            $inbox->delete();
            DB::commit();
            return redirect()->route('inbox.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Dihapus.',
            ]);
        } catch (Error $e) {
            DB::rollback();
            return redirect()->route('inbox.index')->with([
                'f_bg' => 'bg-danger',
                'f_title' => 'Tidak Berhasil',
                'f_msg' => 'Data Tidak Berhasil Dihapus',
            ]);
        }
    }
}
