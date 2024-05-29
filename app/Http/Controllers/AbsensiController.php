<?php
namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Dataekskul;
use App\Models\DataSiswa;
use Illuminate\Http\Request;
use illuminate\support\Facades\Auth;
class AbsensiController extends Controller
{
    // public function index()
    // {
    //     $dtsiswa = DataSiswa::all();
    //     $dtekskul = Dataekskul::all();

    //     $absensi = Absensi::with(['nama_siswa', 'ekskul'])->get();
    //     // return view('Absensi.Absensi');
    //     return view('Absensi.Absensi', compact('dtsiswa', 'dtekskul','absensi'));
    // }

    public function index()
    {
        $ekskul = DataEkskul::where('user_id', Auth::user()->id)->get(); // Mengambil semua data ekstrakurikuler
        return view('Absensi.Absensi', compact('ekskul'));
    }

    // public function show($id)
    // {

    //     $ekskul = DataEkskul::findOrFail($id);


    //     $absensi = Absensi::where('id_ekskul', $id)->get();

    //     return view('Absensi.show', compact('ekskul', 'absensi'));
    // }
    // public function show($id)
    // {
    //     // Mendapatkan semua siswa
    //     $semuaSiswa = Datasiswa::where('id_ekskul',$id)->get();
    //     $idEkskul = $id;

    //     // Mendapatkan semua tanggal absensi untuk ekskul dengan id yang diberikan
    //     $tanggalAbsensi = Absensi::where('id_ekskul', $id)->select('tanggal')->distinct()->orderBy('tanggal')->pluck('tanggal');

    //     // Mendapatkan data absensi untuk setiap siswa untuk ekskul dengan id yang diberikan
    //     $absensi = [];
    //     foreach ($semuaSiswa as $siswa) {
    //         // Query untuk mendapatkan absensi hanya untuk ekskul dengan id yang diberikan
    //         $dataAbsensi = Absensi::where('id_siswa', $siswa->id)->where('id_ekskul', $id)->get();
    //         $absensi[$siswa->id] = $dataAbsensi;
    //     }
    //     // dd($absensi);
    //     return view('absensi.show', compact('semuaSiswa', 'tanggalAbsensi', 'absensi','idEkskul'));
    // }
    public function show($id)
{
    // Mendapatkan semua siswa
    $semuaSiswa = Datasiswa::with('author')
    ->where('status','acc')
    ->where('id_ekskul', $id)
    ->get();
    $idEkskul = $id;

    // Mendapatkan semua tanggal absensi untuk ekskul dengan id yang diberikan
    $tanggalAbsensi = Absensi::where('id_ekskul', $id)->select('tanggal')->distinct()->orderBy('tanggal')->pluck('tanggal');
    // $pertemuanAbsensi = Absensi::where('id_ekskul', $id)->select('pertemuan')->distinct()->orderBy('tanggal')->pluck('tanggal');
    $pertemuanAbsensi = Absensi::where('id_ekskul', $id)
    ->select('pertemuan', 'tanggal')  // Include 'tanggal' to resolve the error
    ->distinct()
    ->orderBy('tanggal')
    ->pluck('pertemuan');
    // Mendapatkan data absensi untuk setiap siswa untuk ekskul dengan id yang diberikan
    $absensi = [];
    $jumlahHadir = [];
    $jumlahIzin = [];
    $jumlahSakit = [];
    $jumlahAlpa = [];
    foreach ($semuaSiswa as $siswa) {
        // Query untuk mendapatkan absensi hanya untuk ekskul dengan id yang diberikan
        $dataAbsensi = Absensi::where('id_siswa', $siswa->id)->where('id_ekskul', $id)->get();
        $absensi[$siswa->id] = $dataAbsensi;

        // Menghitung jumlah hadir, izin, dan sakit
        $jumlahHadir[$siswa->id] = $dataAbsensi->where('kehadiran', 'hadir')->count();
        $jumlahIzin[$siswa->id] = $dataAbsensi->where('kehadiran', 'izin')->count();
        $jumlahSakit[$siswa->id] = $dataAbsensi->where('kehadiran', 'sakit')->count();
        $jumlahAlpa[$siswa->id] = $dataAbsensi->where('kehadiran', 'alpa')->count();
    }

    return view('absensi.show', compact('semuaSiswa', 'tanggalAbsensi','pertemuanAbsensi', 'absensi', 'jumlahHadir', 'jumlahIzin', 'jumlahSakit','jumlahAlpa', 'idEkskul'));
}

    public function create($id)
    {
        // Mendapatkan semua siswa yang terdaftar dalam ekskul dengan id tertentu
        $semuaSiswa = DataSiswa::with('author')->where('status','acc')->where('id_ekskul', $id)->get();
        $idEkskul = $id;

        return view('Absensi.create', compact('semuaSiswa','idEkskul'));
    }

    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'pertemuan' => 'required|integer',
        'absensi' => 'required|array',
        'absensi.*' => 'required|in:hadir,izin,sakit,alpa'
    ]);

    $idEkskul = $request->input('id_ekskul');
    $tanggal = $request->input('tanggal');
    $pertemuan = $request->input('pertemuan');
    $absensiData = $request->input('absensi');
    // dd($idEkskul,$tanggal,$pertemuan,$absensiData);
    foreach ($absensiData as $idSiswa => $status) {
        Absensi::create([
            'id_siswa' => $idSiswa,
            'id_ekskul' => $idEkskul,
            'tanggal' => $tanggal,
            'pertemuan' => $pertemuan,
            'kehadiran' => ucfirst($status)
        ]);
    }

    return redirect()->route('absensi.show', $idEkskul)
                     ->with('success', 'Absensi berhasil disimpan.');
}


    // public function create()
    // {
    //     // $dtsiswa = DataSiswa::all();
    //     $semuaSiswa = Datasiswa::where('id_ekskul',$id)->get();
    //     $dtekskul = Dataekskul::all();
    //     return view('Absensi.create', compact('semuaSiswa', 'dtekskul'));
    // }

    // public function show($id)
    // {
    //     // Mendapatkan semua siswa
    //     $semuaSiswa = Datasiswa::all();

    //     // Mendapatkan semua tanggal absensi
    //     $tanggalAbsensi = Absensi::where('id_ekskul', $id)->select('tanggal')->distinct()->orderBy('tanggal')->pluck('tanggal');

    //     // Mendapatkan data absensi untuk setiap siswa
    //     $absensi = [];
    //     foreach ($semuaSiswa as $siswa) {
    //         $dataAbsensi = Absensi::where('id_siswa', $siswa->id)->get();
    //         $absensi[$siswa->id] = $dataAbsensi;
    //     }

    //     return view('absensi.show', compact('semuaSiswa', 'tanggalAbsensi', 'absensi'));
    // }
    // public function create()
    // {
    //     $dtsiswa = DataSiswa::all();
    //     $dtekskul = Dataekskul::all();
    //     return view('Absensi.create', compact('dtsiswa', 'dtekskul'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_siswa' => 'required',
    //         'ekskul' => 'required',
    //         'tanggal' => 'required|date',
    //         'kehadiran' => 'required|boolean',
    //     ]);

    //     Absensi::create($request->all());

    //     return redirect()->route('absensi.index')
    //                      ->with('success', 'Absensi berhasil ditambahkan.');
    // }

    // public function edit($id)
    // {
    //     $absensi = Absensi::find($id);
    //     $dtsiswa = DataSiswa::all();
    //     $dtekskul = Dataekskul::all();
    //     return view('Absensi.edit', compact('absensi', 'dtsiswa', 'dtekskul'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama_siswa' => 'required',
    //         'ekskul' => 'required',
    //         'tanggal' => 'required|date',
    //         'kehadiran' => 'required|boolean',
    //     ]);

    //     $absensi = Absensi::find($id);
    //     $absensi->update($request->all());

    //     return redirect()->route('absensi.index')
    //                      ->with('success', 'Absensi berhasil diperbarui.');
    // }

    // public function destroy($id)
    // {
    //     Absensi::find($id)->delete();
    //     return redirect()->route('absensi.index')
    //                      ->with('success', 'Absensi berhasil dihapus.');
    // }
}
