<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Illuminate\Support\Facades\Auth;
use Error;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Models\Member;
use App\Models\perhutanan_category;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::all();
        $kategori_perhutanan = perhutanan_category::all();
        return view('admin.member.index', compact('member', 'kategori_perhutanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_perhutanan = perhutanan_category::all();
        return view('admin.member.add', compact('kategori_perhutanan'));
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
            'address' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'religion' => 'required',
            'email' => 'required|email',
            'education' => 'required',
            'golongan' => 'required',
            'img' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'fullname.required' => 'Nama lengkap harus diisi',
            'address.required' => 'Alamat harus diisi',
            'place_of_birth.required' => 'Tempat Lahir harus diisi',
            'date_of_birth.required' => 'Tanggal Lahir harus diisi',
            'religion.required' => 'Agama harus diisi',
            'email.required' => 'E-mail harus diisi',
            'education.required' => 'Pendidikan Terakhir harus diisi',
            'golongan.required' => 'Status harus diisi',
            'img.mimes' => 'File Harus Bertipe JPG/JPEG/PNG'
        ]);

        DB::beginTransaction();
        try {
            $uuid = Uuid::uuid4()->getHex();
            $member = new Member;
            $member->uuid = $uuid;
            $member->fullname = $request->fullname;
            $member->address = $request->address;
            $member->place_of_birth = $request->place_of_birth;
            $member->date_of_birth = $request->date_of_birth;
            $member->religion = $request->religion;
            $member->email = $request->email;
            $member->education = $request->education;
            $member->golongan = $request->golongan;
            $member->level_id = 1; //blm terkoneksi dengan database level
            if ($request->file) {
                $fileName = 'Foto Member__' . $request->fullname . '__' . time() . '__' . $request->file->getClientOriginalName();
                $path = 'public/Member';
                $request->file->storeAs($path, $fileName);
                $member->img = $fileName;
            }
            $member->save();

            DB::commit();

            return redirect()->route('member.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Ditambah.',
            ]);
        } catch (Error $e) {
            DB::rollBack();
            return redirect()->route('member.index')->with([
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
        $member = Member::findOrFail($uuid);
        $kategori_perhutanan = perhutanan_category::all();
        return view('admin.member.edit', compact('member', 'kategori_perhutanan'));
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
        $member = Member::findOrFail($uuid);
        $this->validate($request, [
            'fullname' => 'required',
            'address' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'religion' => 'required',
            'email' => 'required|email',
            'education' => 'required',
            'golongan' => 'required',
            'img' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'fullname.required' => 'Nama lengkap harus diisi',
            'address.required' => 'Alamat harus diisi',
            'place_of_birth.required' => 'Tempat Lahir harus diisi',
            'date_of_birth.required' => 'Tanggal Lahir harus diisi',
            'religion.required' => 'Agama harus diisi',
            'email.required' => 'E-mail harus diisi',
            'education.required' => 'Pendidikan Terakhir harus diisi',
            'golongan.required' => 'Status harus diisi',
            'img.mimes' => 'File Harus Bertipe JPG/JPEG/PNG'
        ]);

        DB::beginTransaction();
        try{
            $member->fullname = $request->fullname;
            $member->address = $request->address;
            $member->place_of_birth = $request->place_of_birth;
            $member->date_of_birth = $request->date_of_birth;
            $member->religion = $request->religion;
            $member->email = $request->email;
            $member->education = $request->education;
            $member->golongan = $request->golongan;
            $member->level_id = 1; //blm terkoneksi dengan database level
            if ($request->file) {
                if (\File::exists('storage/Member/' . $member->img)) {
                    \File::delete('storage/Member/' . $member->img);
                }
                $fileName = 'Foto Member__' . $request->fullname . '__' . time() . '__' . $request->file->getClientOriginalName();
                $path = 'public/Member';
                $request->file->storeAs($path, $fileName);
                $member->img = $fileName;
            }
            $member->save();

            DB::commit();

            return redirect()->route('member.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Diperbarui.',
            ]);
        } catch(Error $e){
            DB::rollBack();
            return redirect()->route('member.index')->with([
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
            $member = Member::findOrFail($uuid);
            if($member->img){
                File::delete('storage/Member/'.$member->img);
            }
            $member->delete();
            DB::commit();
            return redirect()->route('member.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Dihapus.',
            ]);
        } catch (Error $e) {
            DB::rollback();
            return redirect()->route('member.index')->with([
                'f_bg' => 'bg-danger',
                'f_title' => 'Tidak Berhasil',
                'f_msg' => 'Data Tidak Berhasil Dihapus',
            ]);
        }
    }
}
