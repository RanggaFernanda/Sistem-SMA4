<?php

namespace App\Http\Controllers;

use App\Models\Dataekskul;
use Illuminate\Http\Request;
use App\Models\DataPembina;
use RealRashid\SweetAlert\Facades\Alert;

class DataPembinaController extends Controller
{
    public function index()
    {
        $dtpembina = DataPembina::all();
        $dtekskul = Dataekskul::all(); // Assuming you have an Ekstrakulikuler model
        return view('Data Pembina.Data_Pembina', compact('dtpembina', 'dtekskul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pembina' => 'required|string|max:255',
            'nip_pembina' => 'required|string|max:255',
            'email_pembina' => 'required|email|max:255',
            'tugas_pembina' => 'required|string|max:255',
            'jeniskelamin_pembina' => 'required|string|max:10',
            'ekstrakulikuler_pembina' => 'required|string|max:255',
        ]);

        DataPembina::create($request->all());

        Alert::success('Success', 'Data Pembina berhasil ditambahkan');
        return redirect()->route('datapembina.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pembina' => 'required|string|max:255',
            'nip_pembina' => 'required|string|max:255',
            'email_pembina' => 'required|email|max:255',
            'tugas_pembina' => 'required|string|max:255',
            'jeniskelamin_pembina' => 'required|string|max:10',
            'ekstrakulikuler_pembina' => 'required|string|max:255',
        ]);

        $dtpembina = DataPembina::findOrFail($id);
        $dtpembina->update($request->all());

        Alert::success('Success', 'Data Pembina berhasil diperbarui');
        return redirect()->route('datapembina.index');
    }

    public function destroy($id)
    {
        $dtpembina = DataPembina::findOrFail($id);
        $dtpembina->delete();

        Alert::success('Success', 'Data Pembina berhasil dihapus');
        return redirect()->route('datapembina.index');
    }
}
