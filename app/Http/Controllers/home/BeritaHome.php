<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Berita,
    Berita_category,
    Galery,
    Profile,
    Profile_category
};

class BeritaHome extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita_kategori = Berita_category::all();
        $profile_kategori = Profile_category::all();
        $profile = Profile::select('profiles.*', 'profile_categories.id', 'profile_categories.name')
            ->leftJoin('profile_categories', 'profiles.profile_category_id', '=', 'profile_categories.id')->get();
        $berita = Berita::select('beritas.*', 'users.id', 'users.name')
            ->leftJoin('users', 'beritas.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')->paginate(4);
        $galery = Galery::orderBy('created_at', 'desc')->paginate(3);
        $berita_populer = Berita::orderBy('view', 'desc')->paginate(3);
        $berita_terbaru = Berita::orderBy('created_at', 'desc')->paginate(3);
        return view('home.berita.index', compact(
            'profile',
            'berita',
            'profile_kategori',
            'galery',
            'berita_kategori',
            'berita_terbaru',
            'berita_populer'
        ));
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
    public function show($uuid)
    {
        $berita_kategori = Berita_category::all();
        $berita = Berita::select('beritas.*', 'users.id', 'users.name')
            ->leftJoin('users', 'beritas.user_id', '=', 'users.id')
            ->findOrFail($uuid);
        $view = $berita->view + 1;
        $dataInfo = ['view' => $view];
        $berita->update($dataInfo);
        $berita_terbaru = Berita::orderBy('created_at', 'desc')->paginate(3);
        $berita_populer = Berita::orderBy('view', 'desc')->paginate(3);
        return view('home.berita.show', compact('berita', 'berita_kategori', 'berita_terbaru', 'berita_populer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita_kategori = Berita_category::all();
        $berita = Berita::where('berita_category_id', $id)
            ->orderBy('created_at', 'desc')->paginate(4);
        $berita_terbaru = Berita::orderBy('created_at', 'desc')->paginate(3);
        $berita_populer = Berita::orderBy('view', 'desc')->paginate(3);
        return view('home.berita.index', compact('berita', 'berita_kategori', 'berita_terbaru', 'berita_populer'));
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
        //
    }
}
