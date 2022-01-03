<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    User,
    Role
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Error;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $role = Role::all();
        return view('admin.admin.index', compact('role', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('admin.admin.add', compact('role'));
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
            'name' => 'required',
            'username' => 'unique:users|required|min:5',
            'password' => 'required|min:4',
            'role_id' => 'required',
        ], [
            'name.required' => 'Nama lengkap harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username telah ada',
            'username.max' => 'Username minimal 5 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 4 karakter',
            'role_id.required' => 'Pilih role anda',
        ]);

        DB::beginTransaction();
        try {
            $uuid = Uuid::uuid4()->getHex();
            $dataAdmin = new User;
            $dataAdmin->uuid = $uuid;
            $dataAdmin->name = $request->name;
            $dataAdmin->username = $request->username;
            $dataAdmin->password = bcrypt($request->password);
            $dataAdmin->role_id = $request->role_id;
            $dataAdmin->save();

            DB::commit();
            return redirect()->route('admin.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Ditambah.',
            ]);
        } catch (Error $e) {
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
        $dataAdmin = User::findOrFail($uuid);
        $role = Role::all();
        return view('admin.admin.edit', compact('role', 'dataAdmin'));
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
        $dataAdmin = User::findOrFail($uuid);
        $this->validate($request, [
            'name' => 'required',
            'username' => '|required|min:5|unique:users,username,' . $dataAdmin->id,
            'password' => 'required|min:4',
            'role_id' => 'required',
        ], [
            'name.required' => 'Nama lengkap harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username telah ada',
            'username.max' => 'Username minimal 5 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 4 karakter',
            'role_id.required' => 'Pilih role anda',
        ]);
        // dd($request->all());


        DB::beginTransaction();
        try {
            $dataAdmin->name = $request->name;
            $dataAdmin->username = $request->username;
            $dataAdmin->password = bcrypt($request->password);
            $dataAdmin->role_id = $request->role_id;

            $dataAdmin->save();

            DB::commit();
            return redirect()->route('admin.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Diperbarui.',
            ]);
        } catch (Error $e) {
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
        try {
            $user = User::findOrFail($uuid);
            $user->delete();
            DB::commit();
            return redirect()->route('admin.index')->with([
                'f_bg' => 'bg-success',
                'f_title' => 'Berhasil.',
                'f_msg' => 'Data Berhasil Dihapus.',
            ]);
        } catch (Error $e) {
            DB::rollback();
            return redirect()->route('admin.index')->with([
                'f_bg' => 'bg-danger',
                'f_title' => 'Tidak Berhasil',
                'f_msg' => 'Data Tidak Berhasil Dihapus',
            ]);
        }
    }
}
