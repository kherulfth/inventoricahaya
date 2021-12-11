<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Supplier_controller extends Controller
{
    public function index(){
        $title = 'Master Data Supplier';
        $data = M_supplier::orderBy('nama', 'asc')->get();

        return view('supplier.index', compact('title', 'data'));
    }
}
