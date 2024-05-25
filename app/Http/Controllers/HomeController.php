<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DataPembina;
use App\Models\Dataekskul;
use App\Models\Dataevent;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $dataEkskul   = DB::table('dataekskuls')->count();
    //     $dataPrestasi   = DB::table('dataevents')->count();
    //     $dataEvent      = DB::table('dataevents')->count();
    //     $dataPembina    = DB::table('users')->count();
    //     return view('home', compact('dataEkskul', 'dataPrestasi', 'dataEvent', 'dataPembina'));
    // }


        public function index()
        {
            // Fetch the data for the info boxes
            $dataPembina = Datapembina::count();
            $dataEvent = DataEvent::count();
            $dataPrestasi = DataEvent::count();
            $dataEkskul = Dataekskul::count();

            // Calculate total data count
            $totalData = $dataPembina + $dataEvent + $dataPrestasi + $dataEkskul;

            // Example data for the chart
            // You can replace this with actual logic to fetch relevant data
            $chartData = [
                'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'], // Example labels
                'data' => [12, 19, 3, 5, 2, 3] // Example data
            ];

            // Pass the data to the view
            return view('Home', compact('dataPembina', 'dataEvent', 'dataPrestasi', 'dataEkskul', 'chartData', 'totalData'));
        }


    public function userProfile() {
        $user = User::findOrFail(Auth::user()->id);
        return view("Data Profil.Profil_Index", compact("user"));
    }

    public function editUserProfile($id) {
        $user = User::findOrFail($id);
        return view("Data Profil.Profil_Edit", compact("user"));
    }


    // public function updateUserProfile(Request $request, $id) {
    //     $this->validate($request, [
    //         "name" => "required|string",
    //         "email" => "required|email|unique:users,id," . $id,
    //         "password" => "required",
    //     ]);
    //     $user = User::find($id);
    //     $user->update([
    //         "name" => $request->name,
    //         "email" => $request->email,
    //         "password" => hash($request->password),
    //         "jbtn_pelatih" => $request->ekskul,
    //         "alamat" => $request->alamat
    //     ]);
    //     if($request->hasFile('foto_profil'))
    //     {
    //         $destination = 'fotoprofil/'.$user->foto_profil;
    //         if(File::exists($destination))
    //         {
    //             File::delete($destination);
    //         }
    //         $file = $request->file('foto_profil');
    //         $extention = $file->getClientOriginalExtension();
    //         $filename = time().'.'.$extention;
    //         $file->move('fotoprofil/', $filename);
    //         $user->foto_profil = $filename;

    //         // Jika user mengganti passwornya password

    //         if ($user->password != $request->password) {
    //             $user->update([
    //                 "name" => $request->name,
    //                 "email" => $request->email,
    //                 "password" => Hash::make($request->password),
    //                 "foto_profil" => $filename,
    //                 "jbtn_pelatih" => $request->ekskul,
    //                 "alamat" => $request->alamat
    //             ]);
    //         } else {
    //             // Jika user tidak mengganti passwordnya

    //             $user->update([
    //                 "name" => $request->name,
    //                 "email" => $request->email,
    //                 // "password" => $request->password,
    //                 "foto_profil" => $filename,
    //                 "jbtn_pelatih" => $request->ekskul,
    //                 "alamat" => $request->alamat
    //             ]);

    //         }
    //     }

    //     return redirect(route("user.profile", $user->id))->with(["success" => "User berhasil diupdate!"]);
    // }
    public function updateUserProfile(Request $request, $id) {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:5',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->jbtn_pelatih = $request->ekskul;
        $user->alamat = $request->alamat;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto_profil')) {
            $destination = 'fotoprofil/' . $user->foto_profil;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('foto_profil');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('fotoprofil/', $filename);
            $user->foto_profil = $filename;
        }

        $user->save();

        return redirect()->route('user.profile', $user->id)->with('success', 'User berhasil diupdate!');
    }

}
