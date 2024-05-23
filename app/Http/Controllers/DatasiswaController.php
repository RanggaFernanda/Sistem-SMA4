<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\Dataekskul;
// use DataSiswa;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DatasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtsiswa = DB::table('dataekskuls')
        ->join('datasiswas', 'datasiswas.id_ekskul', '=', 'dataekskuls.id')
        ->get();;
        $dtekskull = Dataekskul::all();
        return view('Data Siswa.Data_Siswa', compact('dtsiswa','dtekskull'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data Siswa.Data_Siswa.Tambah_Siswa');

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

        DataSiswa::create($request->all());

    // $dtpembina->save();

    return redirect()->route('datasiswa.index')->with('success', 'Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dtsiswa = DataSiswa::find($id);
        return view('Data Siswa.Data_Siswa', compact('dtsiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dtsiswa = DataSiswa::findOrFail($id);
        return view('Data Siswa.Data_Siswa', compact('dtsiswa'));
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
        // 'nama_siswa' => 'required',
        // 'nisn_siswa' => 'required',
        // 'kelas_siswa' => 'required',
        // 'email_siswa' => 'required|email',
        // 'jeniskelamin_siswa' => 'required',
        // 'ekstrakulikuler_siswa' => 'required',
        'nilai_siswa' => 'required',
    ]);

    $datasiswa = DataSiswa::find($id);
    // $datasiswa->nama_siswa = $request->nama_siswa;
    // $datasiswa->nisn_siswa = $request->nisn_siswa;
    // $datasiswa->kelas_siswa = $request->kelas_siswa;
    // $datasiswa->email_siswa = $request->email_siswa;
    // $datasiswa->jeniskelamin_siswa = $request->jeniskelamin_siswa;
    // $datasiswa->ekstrakulikuler_siswa = $request->ekstrakulikuler_siswa;
    $datasiswa->nilai_siswa = $request->nilai_siswa;
    $datasiswa->save();

    return redirect()->route('datasiswa.index')->with('success', 'Penilaian Berhasil');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $dtsiswa = DataSiswa::findOrFail($id);
        $dtsiswa->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }

}
