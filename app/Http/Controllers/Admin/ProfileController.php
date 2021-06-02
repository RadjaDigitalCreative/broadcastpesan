<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Database;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use DB;

class ProfileController extends Controller
{
    public function index()
    {
         $role_pay = DB::table('users')
        ->join('role_pay', 'users.id', 'role_pay.user_id')
        ->where('role_pay.user_id', auth()->user()->id)
        ->first();
        $skill = DB::table('skill')->get();
        return view('admin.profile.index', compact('skill', 'role_pay'));
    }

    public function destroy($id)
    {
        $data = Waweb::find($id);
        $data->delete();
        return redirect('/waweb')->with('success', 'Data berhasil di hapus');
    }
    public function store(Request $request)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        DB::table('users')
        ->where('id', $request->id)
        ->update([
            'name'  => $request->name,
            'email'  => $request->email,
            'bio' => $request->bio,
            'notelp' => $request->notelp,
            'image' => $image_name,
        ]);
        return redirect('profile')->with('success', 'Data profile berhasil di ubah');
    }
    public function store2(Request $request)
    {
        $count  = count($request->kemampuan);
        DB::table('skill')
        ->where('id_user', $request->id)
        ->delete();
        for ($i=0; $i < $count; $i++) { 
            DB::table('skill')
            ->where('id', $request->id)
            ->insert([
                'kemampuan'  => $request->kemampuan[$i],
                'skill'  => $request->skill[$i],
                'id_user'  => $request->id,
            ]);
        }
        return redirect('profile')->with('success', 'Data skill berhasil di ubah');
    }

}
