<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_supplier;
use App\Models\M_produk;


class Produk_controller extends Controller
{
    public function add(){
        $title = 'Tambah Data';
        $supplier = M_supplier::get();
        $kode = rand();

        return view('produk.add', compact('title','supplier','kode'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'supplier_id' => 'required',
            'nama' => 'required',
            'kode' => 'required',
            'stock' => 'required',
            'minimal_stock' => 'required',
            'harga' => 'required'
        ]);

        $data = $request->except(['_token']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        M_produk::insert($data);

        \Session::flash('sukses', 'Data Berhasil Ditambah');

        return redirect('produk/add');
    }
}
