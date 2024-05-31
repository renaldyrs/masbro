<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

class DataController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Pelanggan::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCustomer">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCustomer">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('haldatapelanggan');

    }
    
    public function store(Request $request)
    {
        Pelanggan::updateOrCreate(['id' => $request->pelanggan_id],
                ['nama' => $request->Nama, 'alamat' => $request->Alamat, 'nohp' => $request->Nohp]);        

        return response()->json(['success'=>'Pelanggan Berhasil Disimpan']);
    }
    
    public function edit($id)
    {
        $Pelanggan = Pelanggan::find($id);
        return response()->json($Pelanggan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::find($id)->delete();

        return response()->json(['success'=>'Pelanggan Dihapus']);
    }

    public function datapelanggan(){
        return view ('haldatapelanggan');
    }
}
