<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Database;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use DB;

class DatabaseController extends Controller
{
    public function index()
    {
        $role_pay = DB::table('users')
        ->join('role_pay', 'users.id', 'role_pay.user_id')
        ->where('role_pay.user_id', auth()->user()->id)
        ->first();
        $data   = Database::all();
        return view('admin.database.index', compact( 'data', 'role_pay'));
    }

    public function destroy($id)
    {
        $data = Waweb::find($id);
        $data->delete();
        return redirect('/waweb')->with('success', 'Data berhasil di hapus');
    }

}
