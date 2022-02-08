<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    perhutanan_category,
    perhutanan,
    Berita_category,
    Profile_category
};

class PerhutananHome extends Controller
{
    public function index(perhutanan_category $slug)
    {
        $berita_kategori = Berita_category::all();
        $profile_kategori = Profile_category::all();
        $perhutanan = perhutanan::leftJoin('perhutanan_categories', 'perhutanans.perhutanan_category_id', '=', 'perhutanan_categories.id')
            ->select('perhutanans.*', 'perhutanan_categories.name')
            ->where('perhutanans.perhutanan_category_id', $slug->id)
            ->get();
        // $perhutanan = perhutanan::all();
        $kategori_perhutanan = perhutanan_category::all();
        // dd($perhutanan);
        $title = perhutanan::where('perhutanan_category_id', $slug->id)->value('title');
        $name = perhutanan_category::where('id', $slug->id)->value('name');
        $content = perhutanan::where('perhutanan_category_id', $slug->id)->value('content');
        $link = perhutanan::where('perhutanan_category_id', $slug->id)->value('link');
        return view('home.perhutanan_sosial.index', compact('perhutanan', 'kategori_perhutanan', 'profile_kategori', 'berita_kategori', 'title', 'name', 'content', 'link'));
    }
}
