<?php

namespace App\Http\Controllers;

use App\Models\Dataekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataekskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role=="Pembina"){
            $dtekskul = Dataekskul::where("user_id",Auth::id())->get();
        }else{
            $dtekskul = Dataekskul::all();
        }
        return view('Data Master.Data Ekskul.Data_Ekskul', compact('dtekskul'));
        // dd($dtekskul);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data Master.Data Ekskul.Tambah_Ekskul');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //   // 'kode_ekskul'=>'required|unique:dataekskuls|min:2|max:4',
        //     'nama_ekskul'=>'required',
        //     'kategori_ekskul'=>'required',
        //     'jadwal_ekskul'=>'required',


        // ]);
        // dd($request);

        DataEkskul::create($request->all());

        // $dataekskul= New Dataekskul;
        // $dataekskul->user_id=Auth::user()->id;

        // $dataekskul->nama_ekskul=$request->get('nama_ekskul');
        // $dataekskul->kategori_ekskul=$request->get('ketegori_ekskul');
        // $dataekskul->jadwal_ekskul=$request->get('jadwal_ekskul');
        // $dataekskul->save();

        return redirect()->route('dataekskul.index')->with('success', 'Alhamdulillah Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataekskul = Dataekskul::find($id);
        return view('Data Master.Data Ekskul.Data_Ekskul', compact('dataekskul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataekskul = Dataekskul::findOrFail($id);
        return view('Data Master.Data Ekskul.Data_Ekskul', compact('dataekskul'));
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
        $request->validate([
            // 'kode_ekskul'=>'required|unique:dataekskuls|min:2|max:4',
            'nama_ekskul'=>'required',
            'kategori_ekskul' =>'required',
            'pelatih_ekskul' =>'required',
        ]);
        Dataekskul::find($id)
            ->update($request->all());

        return redirect()->back()->with('success', 'Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtekskul = Dataekskul::findOrFail($id);
        $dtekskul->delete();
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dihapus');
    }
}
