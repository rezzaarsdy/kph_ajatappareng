<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    perhutanan_category,
    perhutanan
};
use File;
use DB;
use Illuminate\Support\Facades\Auth;
use Error;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class PerhutananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perhutanan = perhutanan::leftJoin('perhutanan_categories', 'perhutanans.perhutanan_category_id', '=', 'perhutanan_categories.id')
            ->select('perhutanans.*', 'perhutanan_categories.name')
            ->get();
        // $perhutanan = perhutanan::all();
        $kategori_perhutanan = perhutanan_category::all();
        // dd($perhutanan);
        return view('admin.perhutanan.index', compact('perhutanan', 'kategori_perhutanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_perhutanan = perhutanan_category::all();
        return view('admin.perhutanan.add', compact('kategori_perhutanan'));
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
            'title' => 'required',
            'content' => 'required'
        ], [
            'title.required' => 'Judul harus diisi',
            'content.required' => 'Isi Content ta'
        ]);

        DB::beginTransaction();
        try {
            $perhutanan = new perhutanan;
            $perhutanan->title = $request->title;
            $perhutanan->perhutanan_category_id = $request->perhutanan_category_id;
            $perhutanan->link = $request->link;
            $perhutanan->content = $request->content;
            $perhutanan->save();
            DB::commit();
            return redirect()->route('perhutanan.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Ditambah.',
            ]);
        } catch (Error $e) {
            DB::rollBack();
            return redirect()->route('perhutanan.list')->with([
                'f_bg' => 'bg-danger',
                'f_title' => 'Tidak Berhasil.',
                'f_msg' => 'Data Tidak Berhasil Ditambah.',
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
        $perhutanan = perhutanan::find($id);
        // dd($perhutanan);
        $kategori_perhutanan = perhutanan_category::all();
        return view('admin.perhutanan.edit', compact('perhutanan', 'kategori_perhutanan'));
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
        $perhutanan = perhutanan::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ], [
            'title.required' => 'Judul harus diisi',
            'content.required' => 'Isi Content ta'
        ]);

        DB::beginTransaction();
        try {
            $perhutanan->title = $request->title;
            $perhutanan->perhutanan_category_id = $request->perhutanan_category_id;
            $perhutanan->link = $request->link;
            $perhutanan->content = $request->content;
            $perhutanan->save();
            DB::commit();
            return redirect()->route('perhutanan.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Ditambah.',
            ]);
        } catch (Error $e) {
            DB::rollBack();
            return redirect()->route('perhutanan.list')->with([
                'f_bg' => 'bg-danger',
                'f_title' => 'Tidak Berhasil.',
                'f_msg' => 'Data Tidak Berhasil Ditambah.',
            ]);
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
        DB::beginTransaction();
        try {
            $kategori = perhutanan::find($id);

            $kategori->delete();
            DB::commit();
            return redirect()->route('perhutanan.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Dihapus.',
            ]);
        } catch (Error $e) {
            DB::rollback();
            return redirect()->route('perhutanan.index')->with([
                'f_bg' => 'bg-danger',
                'f_title' => 'Tidak Berhasil',
                'f_msg' => 'Data Tidak Berhasil Dihapus',
            ]);
        }
    }
}
