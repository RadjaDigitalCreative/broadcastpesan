<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProfileApi extends Controller
{
    public function image(Request $request)
    {
        $gambar = DB::table('users')
        ->where('id', $request->id)
        ->select('image')
        ->first();

        $image_name = $gambar->image;
        $image = $request->file('image');
        if($image != '')
        {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }

        $data = DB::table('users')
        ->where('id',$request->id)
        ->update([
            'image' => $image_name,
        ]);
        return response()->json([
            'users' => 'Gambar profil berhasil diupdate',
            'status_code'   => 200,
            'msg'           => 'success',
        ], 200);
    }
    public function index()
    {
        $data = DB::table('users')
        ->paginate(10);
        return response()->json([
            'users' => $data,
            'status_code'   => 200,
            'msg'           => 'success',
        ], 200);
    }
    public function get($id)
    {
        $data = DB::table('users')
        ->where('id', $id)
        ->get();
        return response()->json([
            'users' => $data,
            'status_code'   => 200,
            'msg'           => 'success',
        ], 200);

    }
    public function update(Request $request)
    {
        if($request->image == NULL){
             $data = DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'bio' => $request->bio,
                'notelp' => $request->notelp,
            ]);
          
            return response()->json([
                'users' => $data,
                'status_code'   => 200,
                'msg'           => 'success',
            ], 200);
        }
        elseif($request->image != NULL){
            $image = $request->file('image');
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $data = DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'bio' => $request->bio,
                'notelp' => $request->notelp,
                'image'  => $image_name
            ]);
          
            return response()->json([
                'users' => $data,
                'status_code'   => 200,
                'msg'           => 'success',
            ], 200);
        }
       
    }
}
