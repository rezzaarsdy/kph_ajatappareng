<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\{
    Berita_category,
    Profile,
    Profile_category,
    Member
};
use Illuminate\Http\Request;

class ProfileHome extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function struktur(){
        $berita_kategori = Berita_category::all();
        $profile_kategori = Profile_category::all();
        return view('home.profile.struktur', compact('berita_kategori', 'profile_kategori'));
    }
    
    public function sumberdaya(){
        $berita_kategori = Berita_category::all();
        $profile_kategori = Profile_category::all();
        $member = Member::all();
        return view('home.profile.sumberdaya', compact('member', 'berita_kategori', 'profile_kategori'));
    }
    public function index()
    {
        //
    }

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

}