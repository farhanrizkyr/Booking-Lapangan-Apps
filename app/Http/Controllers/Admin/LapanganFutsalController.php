<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LapanganFutsal;
use Illuminate\Http\Request;

class LapanganFutsalController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->middleware('auth:admin');
     }
    public function index()
    {
        $lapangans=LapanganFutsal::latest()->get();
        return View('Admin.Lapangan',compact('lapangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('Admin.add_lapangan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'nama_lapangan'=>'required',
         'gambar'=>'required|mimes:jpg,png,jpeg',
         'jenis_rumput'=>'required',
         'desc'=>'required',

        ], 
    
       [
        'nama_lapangan.required'=>'Wajib Di isi',
        'gambar.required'=>'Wajib Di isi',
        'gambar.mimes'=>'Gambar Wajib JPG,PNG,JPEG',
        'jenis_rumput.required'=>'Wajib Di isi',
        'desc.required'=>'Wajib Di isi',
       ]);

       if ($request->file('gambar')) {
          $file=$request->file('gambar');
          $filename=time().'.'.$file->getClientOriginalExtension();
          $file->move(public_path('Gambar_Lapangan'),$filename);

          LapanganFutsal::create([
          'nama_lapangan'=>$request->nama_lapangan,
          'jenis_rumput'=>$request->jenis_rumput,
          'desc'=>$request->desc,
          'gambar'=>$filename,
          ]);
       }

       return redirect('apps-admin/lapangan-futsal/list')->with('status','Data Lapangan Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(LapanganFutsal $lapanganFutsal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=LapanganFutsal::find($id);
        if ($data==false) {
            return redirect('apps-admin/lapangan-futsal/list')->with('gagal','Data Lapangan Tidak Ada');
        }
        return View('Admin.edit_Lapangan',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        
        $request->validate([
            'nama_lapangan'=>'required',
            'gambar'=>'mimes:jpg,png,jpeg',
            'jenis_rumput'=>'required',
            'desc'=>'required',
   
           ], 
       
          [
           'nama_lapangan.required'=>'Wajib Di isi',
           'gambar.required'=>'Wajib Di isi',
           'gambar.mimes'=>'Gambar Wajib JPG,PNG,JPEG',
           'jenis_rumput.required'=>'Wajib Di isi',
           'desc.required'=>'Wajib Di isi',
          ]);

          if ($request->gambar <> '') {
            $file=$request->file('gambar');
          $filename=time().'.'.$file->getClientOriginalExtension();
          $file->move(public_path('Gambar_Lapangan'),$filename);

          LapanganFutsal::find($id)->update([
          'nama_lapangan'=>$request->nama_lapangan,
          'jenis_rumput'=>$request->jenis_rumput,
          'desc'=>$request->desc,
          'gambar'=>$filename,
          ]);

          if ($request->gambar_lama) {
            unlink(public_path('Gambar_Lapangan').'/'.$request->gambar_lama);
          }

          }

          else{
            LapanganFutsal::find($id)->update([
                'nama_lapangan'=>$request->nama_lapangan,
                'jenis_rumput'=>$request->jenis_rumput,
                'desc'=>$request->desc,
               
                ]);
          }

          return redirect('apps-admin/lapangan-futsal/list')->with('status','Data Lapangan Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=LapanganFutsal::find($id);
        $data->delete();
       if ($data->gambar <> '') {
       unlink(public_path('Gambar_Lapangan').'/'.$data->gambar);
       }
       return redirect('apps-admin/lapangan-futsal/list')->with('status','Data Lapangan Berhasil Di Hapus');
    }


   
    
}
