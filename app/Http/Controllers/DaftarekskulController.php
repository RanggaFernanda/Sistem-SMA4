<?php

namespace App\Http\Controllers;

use App\Models\Daftarekskul;
use App\Models\Dataekskul;
// use Daftarekskul;
use Illuminate\Http\Request;
use illuminate\support\Facades\Auth;



class DaftarekskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // echo Auth::id();
    $dtekskul = Dataekskul::all();
    
    if (Auth::user()->role == 'Siswa') {
        $dtdaftarekskul = Daftarekskul::where('user_id', Auth::id())->get();
    } else {
        $dtdaftarekskul = Daftarekskul::all();
    }

    return view('Data Daftar Ekskul.Data_DaftarEkskul', compact('dtdaftarekskul', 'dtekskul'));
}

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data Daftar Ekskul.Data_DaftarEkskul.Tambah_ekskul');
        
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
        //     'nama_pembina'=>'required',
        //     'email_pembina'=>'required',          
        // ]);
        // $dtpembina = New DataPembina();
        // $dtpembina->nama_pembina=$request->get('nama_pembina');
        // $dtpembina->email_pembina=$request->get('email_pembina');
        // $dtpembina->status_pembina=$request->get('status_pembina');
        // $dtpembina->tugas_pembina=$request->get('tugas_pembina');
        // $dtpembina->alamat_pembina=$request->get('alamat_pembina');
        // if($request->hasFile('foto_pembina'))
        // {
        // $file = $request->file('foto_pembina');
        // $extention = $file->getClientOriginalExtension();
        // $filename = time().'.'.$extention;
        // $file->move('fotoevent/', $filename);
        // $dtpembina->foto_kegiatan = $filename;

        Daftarekskul::create($request->all());
    
    // $dtpembina->save();

    return redirect()->route('daftarekskul.index')->with('success', 'Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dtsiswa = Daftarekskul::find($id);
        return view('Data Daftar Ekskul.Data_DaftarEkskul', compact('dtdaftarekskul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dtsiswa = Daftarekskul::findOrFail($id);
        return view('Data Daftar Ekskul.Data_daftarEkskul', compact('dtdaftarekskul'));
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
        // Validasi sesuai dengan kolom yang ada
        'nama_siswa' => 'required',
        'nisn_siswa' => 'required',
        'kelas_siswa' => 'required',
        'email_siswa' => 'required|email',
        'jeniskelamin_siswa' => 'required',
        'ekstrakulikuler_siswa' => 'required',
        
    ]);

    $datasiswa = Daftarekskul::find($id);
    $datasiswa->nama_siswa = $request->nama_siswa;
    $datasiswa->nisn_siswa = $request->nisn_siswa;
    $datasiswa->kelas_siswa = $request->kelas_siswa;
    $datasiswa->email_siswa = $request->email_siswa;
    $datasiswa->jeniskelamin_siswa = $request->jeniskelamin_siswa;
    $datasiswa->ekstrakulikuler_siswa = $request->ekstrakulikuler_siswa;
 
    $datasiswa->save();

    return redirect()->route('daftarekskul.index')->with('success', 'Data ekstra berhasil diupdate');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $dtsiswa = Daftarekskul::findOrFail($id);
        $dtsiswa->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }
    
}
