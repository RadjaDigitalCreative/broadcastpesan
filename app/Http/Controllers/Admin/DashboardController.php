<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Waweb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $role_pay = DB::table('users')
        ->join('role_pay', 'users.id', 'role_pay.user_id')
        ->where('role_pay.user_id', auth()->user()->id)
        ->first();
        return view('admin.dashboard.index', compact('role_pay'));
    }

    public function bayar()
    {
        $role_pay = DB::table('users')
        ->join('role_pay', 'users.id', 'role_pay.user_id')
        ->where('role_pay.user_id', auth()->user()->id)
        ->first();
        $data2 = DB::table('harga')->get();

        return view('admin.user.bayar', compact('role_pay', 'data2'));
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

    public function destroy($id)
    {
        $data = Waweb::find($id);
        $data->delete();
        return redirect('/admin/waweb')->with('success', 'Data berhasil di hapus');
    }
    public function import(Request $request)
    {
        Excel::import(new WaImport,request()->file('file'));
        Excel::import(new DatabaseImport,request()->file('file'));
        return back()->with('success', 'Import CSV Suskses!!!');
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
        $id = $request->id;
        DB::table('waweb')
        ->where('id', '=', $id)
        ->update([
            'status' => 1
        ]); 
        DB::table('database')
        ->insert([
            'name' => $request->name,
            'number' => $request->number,
            'text' => $request->text,
            'created_at' => date('Y-m-d', strtotime(now())),
            'updated_at' => date('Y-m-d', strtotime(now())),
        ]);
        $url = "https://api.whatsapp.com/send?text=".$request->text."&phone=+62".$request->number;
        echo "<script>window.open('".$url."', '_blank')</script>";

        $data   = Waweb::all();
        $role  = DB::table('role')
        ->join('users', 'role.user_id', '=', 'users.id')
        ->get();
        $bayar = DB::table('users')
        ->join('role_payment', 'users.id', '=', 'role_payment.user_id')
        ->get();


        return view('backend.waweb.index', compact( 'role', 'bayar', 'data'));
    }
    public function delete()
    {
        DB::table('waweb')->delete();
        return redirect('/admin/waweb')->with('success', 'Semua Data berhasil di hapus');
    }
}
