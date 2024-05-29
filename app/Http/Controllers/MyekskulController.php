<?php

namespace App\Http\Controllers;

use App\Models\Daftarekskul;
use App\Models\Myekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyekskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::user()->role == 'Administrator') {
            $dtdaftarekskul = Daftarekskul::All();
            if (Auth::user()->role == 'Siswa') {
                $dtdaftarekskul = Daftarekskul::where('user_id', Auth::id())->get();
            } else {
                $dtdaftarekskul = Daftarekskul::all();
            }
            return view('Data Myekskul.Data_Myekskul', compact('dtdaftarekskul'));
        // } else {
        //     $dtevent = Dataevent::where('user_id', auth()->user()->id)->get();
        //     // dd($dtevent);
        //     return view('Data Prestasi.Data_Prestasi', compact('dtevent'));
        // }
        // dd($dtevent);
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
        //
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
        DB::transaction(function () use ($id) {
            // Delete related records from the absensi table
            DB::table('absensi')->where('id_siswa', $id)->delete();

            DaftarEkskul::findOrFail($id)->delete();
        });

        return redirect()->route('myekskul.index')->with('success', 'Data berhasil dihapus.');
    }

}
