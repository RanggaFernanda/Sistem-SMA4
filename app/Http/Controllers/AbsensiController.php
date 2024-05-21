<?php
namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Dataekskul;
use App\Models\DataSiswa;
use Illuminate\Http\Request;
use illuminate\support\Facades\Auth;
class AbsensiController extends Controller
{
    public function index()
    {
        $dtsiswa = DataSiswa::all();
        $dtekskul = Dataekskul::all();
        return view('Absensi.Absensi', compact('dtsiswa', 'dtekskul'));
        
        $absensi = Absensi::with(['nama_siswa', 'ekskul'])->get();
        return view('Absensi.Absensi');
    }

    public function create()
    {
        $dtsiswa = DataSiswa::all();
        $dtekskul = Dataekskul::all();
        return view('Absensi.create', compact('dtsiswa', 'dtekskul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'ekskul' => 'required',
            'tanggal' => 'required|date',
            'kehadiran' => 'required|boolean',
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')
                         ->with('success', 'Absensi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $absensi = Absensi::find($id);
        $dtsiswa = DataSiswa::all();
        $dtekskul = Dataekskul::all();
        return view('Absensi.edit', compact('absensi', 'dtsiswa', 'dtekskul'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'ekskul' => 'required',
            'tanggal' => 'required|date',
            'kehadiran' => 'required|boolean',
        ]);

        $absensi = Absensi::find($id);
        $absensi->update($request->all());

        return redirect()->route('absensi.index')
                         ->with('success', 'Absensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Absensi::find($id)->delete();
        return redirect()->route('absensi.index')
                         ->with('success', 'Absensi berhasil dihapus.');
    }
}
