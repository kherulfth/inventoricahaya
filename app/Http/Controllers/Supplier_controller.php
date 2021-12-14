<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_supplier;

class Supplier_controller extends Controller
{
    public function index(){
        $title = 'Master Data Supplier';
        $data = M_supplier::orderBy('nama', 'asc')->get();

        return view('supplier.index', compact('title', 'data'));
    }

    public function add(){
        $title = 'Tambah Data';

        return view('supplier.add', compact('title'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $a['nama'] = $request->nama;
        $a['no_telp'] = $request->no_telp;
        $a['alamat'] = $request->alamat;
        $a['created_at'] = date('Y-m-d H:i:s');
        $a['updated_at'] = date('Y-m-d H:i:s');

        M_supplier::insert($a);
        \Session::flash('sukses', 'Data Berhasil Ditambah');
        return redirect('supplier');
    }
}
