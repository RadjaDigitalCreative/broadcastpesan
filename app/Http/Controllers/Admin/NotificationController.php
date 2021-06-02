<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NotificationController extends Controller
{

    public function index()
    {
         $role_pay = DB::table('users')
        ->join('role_pay', 'users.id', 'role_pay.user_id')
        ->where('role_pay.user_id', auth()->user()->id)
        ->first();
        $data = DB::table('users')
        ->join('role_pay', 'users.id', 'role_pay.user_id')
        ->select([  
            'users.id',
            'users.name',
            'users.email',
            'users.password',
            'users.image',
            'users.bio',
            'users.notelp',
            'users.id_data',
            'users.created_at',
            'users.updated_at',
            'role_pay.user_id',
            'role_pay.dibayar',
            'role_pay.tgl_bayar',
            'role_pay.harga',
            'role_pay.pay',
            'role_pay.image AS bukti',
            'role_pay.is_read',
            'role_pay.created_at AS notif_tgl',
        ])
        ->where('role_pay.pay', 1)
        ->get();
        $data2 = DB::table('harga')->get();
        return view('admin.notification.index', compact( 'data', 'data2', 'role_pay'));
    }
    public function konfirmasi()
    {
         $role_pay = DB::table('users')
        ->join('role_pay', 'users.id', 'role_pay.user_id')
        ->where('role_pay.user_id', auth()->user()->id)
        ->first();
        $data = DB::table('users')
        ->join('role_pay', 'users.id', 'role_pay.user_id')
        ->select([  
            'users.id',
            'users.name',
            'users.email',
            'users.password',
            'users.image',
            'users.bio',
            'users.notelp',
            'users.id_data',
            'users.created_at',
            'users.updated_at',
            'role_pay.user_id',
            'role_pay.dibayar',
            'role_pay.tgl_bayar',
            'role_pay.harga',
            'role_pay.pay',
            'role_pay.image AS bukti',
            'role_pay.is_read',
            'role_pay.created_at AS notif_tgl',
        ])
        ->where('role_pay.pay', 2)
        ->get();
        $data2 = DB::table('harga')->get();
        return view('admin.notification.konfirmasi', compact( 'data', 'data2', 'role_pay'));
    }

}
