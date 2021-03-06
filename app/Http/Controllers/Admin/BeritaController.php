<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Berita_category;
use App\Models\perhutanan_category;
use File;
use DB;
use Illuminate\Support\Facades\Auth;
use Error;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::select('beritas.*', 'users.id', 'users.name')
            ->leftJoin('users', 'beritas.user_id', '=', 'users.id')->get();
            $kategori_perhutanan = perhutanan_category::all();
        return view('admin.berita.index', compact('berita', 'kategori_perhutanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Berita_category::all();
        $kategori_perhutanan = perhutanan_category::all();
        return view('admin.berita.add', compact('category', 'kategori_perhutanan'));
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
            'slug' => 'required|unique:beritas',
            'berita_category_id' => 'required',
            'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required'
        ], [
            'title.required' => 'Judul harus diisi',
            'berita_category_id.required' => 'Kategori berita harus diisi',
            'file.mimes' => 'File Harus Bertipe JPG/JPEG/PNG',
            'content.required' => 'Isi Berita harus diisi'
        ]);

        DB::beginTransaction();
        try{
            $uuid = Uuid::uuid4()->getHex();
            $berita = new Berita;
            $berita->uuid = $uuid;
            $berita->title = $request->title;
            $berita->slug = $request->slug;
            $berita->berita_category_id = $request->berita_category_id;
            $berita->user_id = Auth()->user()->id;
            $berita->content = $request->content;
            if($request->file){
                $nameFile = 'Foto Berita__' . $berita->title .  '__' . time() . '__' . $request->file->getClientOriginalName();
                $path = 'public/Berita';
                $request->file->storeAs($path, $nameFile);
                $berita->img = $nameFile;
            }
            $berita->save();
            
            DB::commit();
            return redirect()->route('berita.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil',
                'f_msg' => 'Data Berhasil Ditambah',
            ]);
        } catch (Error $e){
            DB::rollBack();
            return redirect()->route('berita.index')->with([
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
    public function edit($uuid)
    {
        $category = Berita_category::all();
        $berita = Berita::findOrFail($uuid);
        $kategori_perhutanan = perhutanan_category::all();
        return view('admin.berita.edit', compact('berita', 'category', 'kategori_perhutanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid, Berita $berita)
    {
        $berita = Berita::findOrFail($uuid);
        $rules = [
            'title' => 'required',
            'berita_category_id' => 'required',
            'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required'
        ];[
            'title.required' => 'Judul harus diisi',
            'berita_category_id.required' => 'Kategori berita harus diisi',
            'file.mimes' => 'File Harus Bertipe JPG/JPEG/PNG',
            'content.required' => 'Isi Berita harus diisi'
        ];
        if($request->slug != $berita->slug){
            $rules['slug'] = 'unique:beritas';
        }
        $validateData = $request->validate($rules);
        // $request->validate($rules);

        DB::beginTransaction();
        try{
            $berita->title = $request->title;
            $berita->slug = $request->slug;
            $berita->berita_category_id = $request->berita_category_id;
            $berita->content = $request->content;

            if ($request->file) {
                if (\File::exists('storage/Berita/' . $berita->img)) {
                    \File::delete('storage/Berita/' . $berita->img);
                }
                $fileName = 'Foto Berita__' . $berita->title . '__' . time() . '__' . $request->file->getClientOriginalName();
                $path = 'public/Member';
                $request->file->storeAs($path, $fileName);
                $berita->img = $fileName;
            }
            $berita->save();
            DB::commit();
            return redirect()->route('berita.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Diperbarui.',
            ]);
        } catch(Error $e){
            DB::rollBack();
            return redirect()->route('berita.index')->with([
                'f_bg' => 'bg-danger',
                'f_title' => 'Tidak berhasil',
                'f_msg' => 'Data Tidak Berhasil Diperbarui.',
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
            $berita = Berita::findOrFail($uuid);
            if($berita->img){
                \File::delete('storage/Berita/'.$berita->img);
            }
            $berita->delete();
            DB::commit();
            return redirect()->route('berita.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Dihapus.',
            ]);
        } catch (Error $e) {
            DB::rollback();
            return redirect()->route('berita.index')->with([
                'f_bg' => 'bg-danger',
                'f_title' => 'Tidak Berhasil',
                'f_msg' => 'Data Tidak Berhasil Dihapus',
            ]);
        }
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
