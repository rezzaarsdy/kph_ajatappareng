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
