<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Profile,
    Profile_category
};
use File;
use DB;
use Illuminate\Support\Facades\Auth;
use Error;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::select('profiles.*', 'profile_categories.id', 'profile_categories.name')
            ->leftJoin('profile_categories', 'profiles.profile_category_id', '=', 'profile_categories.id')->get();
        return view('admin.profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Profile_category::all();
        return view('admin.profile.add', compact('kategori'));
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
            'profile_category_id' => 'required',
            'content' => 'required',
        ], [
            'profile_category_id.required' => 'Kategori Harus Dipilih',
            'content.required' => 'Content harus diisi',
        ]);

        DB::beginTransaction();
        try{
            $profile = new Profile;
            $uuid = Uuid::uuid4()->getHex();
            $profile->uuid = $uuid;
            $profile->profile_category_id = $request->profile_category_id;
            $profile->content = $request->content;
            $profile->save();

            DB::commit();
            return redirect()->route('profile.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Ditambah.',
            ]);
        }catch (Error $e){
            DB::rollBack();
            return redirect()->route('admin.index')->with([
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
        $profile = Profile::findOrFail($uuid);
        $kategori = Profile_category::all();
        return view('admin.profile.add', compact('profile', 'kategori'));
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
        $profile = Profile::findOrFail($uuid);
        $this->validate($request, [
            'profile_category_id' => 'required',
            'content' => 'required',
        ], [
            'profile_category_id.required' => 'Kategori Harus Dipilih',
            'content.required' => 'Content harus diisi',
        ]);

        DB::beginTransaction();
        try{
            $profile->profile_category_id = $request->profile_category_id;
            $profile->content = $request->content;
            $profile->save();

            DB::commit();
            return redirect()->route('profile.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Diperbarui.',
            ]);
        }catch (Error $e){
            DB::rollBack();
            return redirect()->route('admin.index')->with([
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
            $profile = Profile::findOrFail($uuid);
            $profile->delete();
            DB::commit();
            return redirect()->route('profile.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Dihapus.',
            ]);
        } catch (Error $e) {
            DB::rollback();
            return redirect()->route('profile.index')->with([
                'f_bg' => 'bg-danger',
                'f_title' => 'Tidak Berhasil',
                'f_msg' => 'Data Tidak Berhasil Dihapus',
            ]);
        }
    }
}
