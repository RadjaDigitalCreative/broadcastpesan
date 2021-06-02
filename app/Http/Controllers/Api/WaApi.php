<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Api\Models\WaImport;
use App\Jobs\ImportJob;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Concerns\ToModel;
use Response;
use DB;

class WaApi extends Controller
{
    public function kirim(Request $request)
    {   
        $data = DB::table('wa')
        ->where('id', $request->id)
        ->update([
            'status'  => 1,
        ]);
         return response()->json([
            'Wa Blast Data' => 'data WA Blast berhasil dikirim',
            'status_code'   => 200,
            'msg'           => 'success',
        ], 200);
    }
    public function format()
    {
        $file= public_path(). "/format_wa_excel.xlsx";
        $headers = array(
            'Content-Type: application/xlsx',
        );
        return Response::download($file, 'format_wa_excel.xlsx', $headers);
    }

    public function create(Request $request)
    {
        $data = DB::table('wa')
        ->insert([
            'name'  => $request->name,
            'number'  => $request->number,
            'text'  => $request->text,
            'id_data' => $request->role,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $id = DB::getPdo()->lastInsertId();
        DB::table('role')
        ->insert([
            'id_wa'  => $id,
            'id_data'  => $request->role,
        ]);
        return response()->json([
            'Wa Blast Data' => 'data WA Blast berhasil dimasukkan',
            'status_code'   => 200,
            'msg'           => 'success',
        ], 200);
    }
    public function index(Request $request)
    {
        $data = DB::table('wa')
        ->where('wa.id_data',  $request->role)
        ->where('wa.name',  '!=', 'NAMA')
        ->where('wa.status', NULL)
        ->select([
            'wa.id',
            'wa.name',
            'wa.number',
            'wa.text',
            'wa.status',
            'wa.created_at',
            'wa.updated_at',
        ])
        ->orderBy('wa.id', 'DESC')
        ->get();
        return response()->json([
            'Wa Blast Data' => $data,
            'status_code'   => 200,
            'msg'           => 'success',
        ], 200);
    }
    public function get($id)
    {
        $data = DB::table('wa')
        ->where('name', '!=', 'NAMA')
        ->where('status',  NULL )
        ->where('id',  $id )
        ->get();
        return response()->json([
            'Wa Blast Data' => $data,
            'status_code'   => 200,
            'msg'           => 'success',
        ], 200);
    }
    public function destroy(Request $request)
    {
        $data = DB::table('wa')
        ->where('id', $request->id)
        ->delete();
        return response()->json([
            'Wa Blast Data' => 'Data Berhasil Dihapus',
            'status_code'   => 200,
            'msg'           => 'success',
        ], 200);
    }
    public function destroyAll(Request $request)
    {
        $data = DB::table('wa')
        ->where('id_data', $request->role)
        ->delete();
        return response()->json([
            'Wa Blast Data' => 'Semua data berhasil dihapus',
            'status_code'   => 200,
            'msg'           => 'success',
        ], 200);
    }
    public function import(Request $request)
    {
        $data = Excel::import(new WaImport($request->role), $request->file('file'));
    
        return response()->json([
            'Wa Blast Data' => 'Data Berhasil Diimport',
            'status_code'   => 200,
            'msg'           => 'success',
        ], 200);
    }
}
