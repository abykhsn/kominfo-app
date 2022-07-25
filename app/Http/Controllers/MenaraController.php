<?php

namespace App\Http\Controllers;

use App\Models\GalleryTable;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenaraController extends Controller
{
    public function index()
    {
        $menara = DB::table('menara')->get();

        // mengirim data pegawai ke view index
        return view('/pages/table', ['menara' => $menara]);
    }

    public function ubah($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $menara = DB::table('menara')->where('id', $id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('/pages/ubah', ['menara' => $menara]);
    }

    // update data pegawai
    public function update(Request $request)
    {
        // update data pegawai
        DB::table('menara')->where('id', $request->id)->update([
            'id_kom' => $request->id_kom,
            'id_name' => $request->id_name,
            'new_provider' => $request->new_provider,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'tinggi_menara' => $request->tinggi_menara,
            'kunci' => $request->kunci,
            'stat' => $request->stat,
            'pembayaran' => $request->pembayaran,
            'gambar' => $request->gambar,
        ]);
        // alihkan halaman ke halaman tabel
        return redirect('/tablektṭñk');
    }

    public function create(){
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('gambar')){
            foreach ($request->file('gambar') as $gallery) {
                $name = $gallery->getClientOriginalName();
                $gallery->move(public_path().'/menara', $name);
                $galleries[] = $name; 
            }
        }
        $data['nominal'] = (float) $data['kunci'] * 1000;
        $data['gambar'] = json_encode($galleries);
        Table::create($data);
        return redirect()->route('table');
    }

    public function detail($id){
        $data = Table::where('id', $id)->get();
        return view('pages.detail', ['data' => $data]);
    }
}
