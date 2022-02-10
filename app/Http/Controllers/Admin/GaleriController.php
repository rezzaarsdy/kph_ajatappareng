<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galery;
use App\Models\perhutanan_category;
use File;
use DB;
use Illuminate\Support\Facades\Auth;
use Error;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galery::all();
        $kategori_perhutanan = perhutanan_category::all();
        return view('admin.galeri.index', compact('galeri', 'kategori_perhutanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_perhutanan = perhutanan_category::all();
        return view('admin.galeri.add', compact('kategori_perhutanan'));
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
            'description' => 'required',
            'file.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'title.required' => 'Judul harus diisi',
            'description.required' => 'Deskripsi foto harus diisi',
            'file.mimes' => 'File Harus Bertipe JPG/JPEG/PNG',
        ]);
        // dd($request);

        DB::beginTransaction();
        try{
            $uuid = Uuid::uuid4()->getHex();
            $galeri = new Galery;
            $galeri->uuid = $uuid;
            $galeri->title = $request->title;
            $galeri->description = $request->description;
            $imgData=array();
            if($request->file){
                foreach ($request->file as $file){
                    $nameFile = 'Foto Galeri' . $galeri->title .  '__' . time() . '__' . $file->getClientOriginalName();
                    $path = 'public/Galeri';
                    $file->storeAs($path, $nameFile);
                    $imgData[] = $nameFile;
                }
            }
            $galeri->img = implode('|', $imgData);
            $galeri->save();

            DB::commit();
            return redirect()->route('galeri.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil',
                'f_msg' => 'Data Berhasil Ditambah',
            ]);
        } catch(Error $e){
            DB::rollBack();
            return redirect()->route('galeri.index')->with([
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
        $galeri = Galery::all();
        $kategori_perhutanan = perhutanan_category::all();
        return view('admin.galeri.edit', compact('galeri', 'kategori_perhutanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $galeri = Galery::findOrFail($uuid);
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'title.required' => 'Judul harus diisi',
            'description.required' => 'Deskripsi foto harus diisi',
            'file.mimes' => 'File Harus Bertipe JPG/JPEG/PNG',
        ]);
        
        DB::beginTransaction();
        try{
            $galeri->uuid = $uuid;
            $galeri->title = $request->title;
            $galeri->description = $request->description;
            if($request->file){
                if (\File::exists('storage/Galeri/' . $galeri->img)) {
                    \File::delete('storage/Galeri/' . $galeri->img);
                }
                $nameFile = 'Foto Galeri' . $galeri->title .  '__' . time() . '__' . $request->file->getClientOriginalName();
                $path = 'public/Galeri';
                $request->file->storeAs($path, $nameFile);
                $galeri->img = $nameFile;
            }
            $galeri->save();

            DB::commit();
            return redirect()->route('galeri.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil',
                'f_msg' => 'Data Berhasil Ditambah',
            ]);
        } catch (Error $e){
            DB::rollBack();
            return redirect()->route('galeri.index')->with([
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
    public function destroy($uuid)
    {
        DB::beginTransaction();
        try{
            $galeri = Galery::findOrFail($uuid);
            if($galeri->img){
                \File::delete('storage/Galeri/'.$galeri->img);
            }
            $galeri->delete();
            DB::commit();
            return redirect()->route('galeri.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Dihapus.',
            ]);
        } catch (Error $e) {
            DB::rollback();
            return redirect()->route('galeri.index')->with([
                'f_bg' => 'bg-danger',
                'f_title' => 'Tidak Berhasil',
                'f_msg' => 'Data Tidak Berhasil Dihapus',
            ]);
        }
    }
}
