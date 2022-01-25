<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\{
    Berita,
    Berita_category,
    Galery,
    Profile,
    Profile_category
};
use Illuminate\Http\Request;

class ProfileHome extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $berita_kategori = Berita_category::all();
        $profile_kategori = Profile_category::all();
        $title = Profile_category::where('id', $id)->value('name');
        $profile_content = Profile::where('profile_category_id', $id)->value('content');
        $profile = Profile::select('profiles.*', 'profile_categories.id', 'profile_categories.name')
            ->leftJoin('profile_categories', 'profiles.profile_category_id', '=', 'profile_categories.id')->get();
        return view('home.profile.show', compact('profile', 'profile_content', 'berita_kategori', 'profile_kategori', 'title'));
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
