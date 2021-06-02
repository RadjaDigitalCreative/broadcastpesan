<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Waweb;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\WaImport;
use App\Imports\DatabaseImport;
use App\Jobs\ImportJob;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use DB;
use Maatwebsite\Excel\Concerns\ToModel;



class WaWebController extends Controller
{
    public function index()
    {
         $role_pay = DB::table('users')
        ->join('role_pay', 'users.id', 'role_pay.user_id')
        ->where('role_pay.user_id', auth()->user()->id)
        ->first();
        $data = DB::table('wa')
       
        ->select(
            'wa.id',
            'wa.name',
            'wa.number',
            'wa.text',
            'wa.status',
           
        )
        ->get();

        $data2   = User::all();
        return view('admin.waweb.index', compact( 'data', 'data2', 'role_pay'));
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Waweb $waweb)
    {
        //
    }

    public function edit(Waweb $waweb)
    {
        //
    }

    public function update(Request $request, Waweb $waweb)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
        $data = Waweb::find($id);
        $data->delete();
        $ami = DB::table('role')
        ->where('id_wa', $request->name)
        ->delete();
        return redirect('/waweb')->with('success', 'Data berhasil di hapus');
    }
    public function import(Request $request)
    {
        $data = Excel::import(new WaImport($request->role), $request->file('file'));
     
       
        Excel::import(new DatabaseImport,request()->file('file'));
        return redirect('/waweb')->with('success', 'Data berhasil di simpan');


    }
    public function send(Request $request)
    {
        $url = $request->send;
        $itung = count($request->send);

        for ($i=0; $i < $itung; $i++) { 
            echo "<script>window.open('".$url[$i]."', '_blank')</script>";
        }
        // return redirect('admin/waweb')->with('success', 'Data Berhasil di tambahkan');
    }
    public function status(Request $request)
    {   
         $role_pay = DB::table('users')
        ->join('role_pay', 'users.id', 'role_pay.user_id')
        ->where('role_pay.user_id', auth()->user()->id)
        ->first();
        $id = $request->id;
        DB::table('wa')
        ->where('id', '=', $id)
        ->update([
            'status' => 1
        ]); 
        DB::table('database')
        ->where('number', '=', $request->number)
        ->delete();

        DB::table('database')
        ->insert([
            'name' => $request->name,
            'number' => $request->number,
            'text' => $request->text,
            'status' => 1,
            'created_at' => date('Y-m-d', strtotime(now())),
            'updated_at' => date('Y-m-d', strtotime(now())),
        ]);
        $url = "https://api.whatsapp.com/send?text=".$request->text."&phone=+62".$request->number;
        echo "<script>window.open('".$url."', '_blank')</script>";

        $data = DB::table('wa')

        ->select(
            'wa.id',
            'wa.name',
            'wa.number',
            'wa.text',
            'wa.status',
           
        )
        ->get();
        $data2   = User::all();


        return view('admin.waweb.index', compact( 'data', 'data2', 'role_pay'));
    }
    public function delete()
    {
        DB::table('wa')->delete();
        DB::table('role')->delete();
        return redirect('/waweb')->with('success', 'Semua Data berhasil di hapus');
    }
}
