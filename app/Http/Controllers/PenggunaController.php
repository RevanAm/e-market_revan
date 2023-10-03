<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDOException;
use Exception;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($user = Auth::user()) {
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('pembelian');
                    break;
            }
        }
        return view('auth.login');
    }
    public function CheckLogin(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $request->session()->regenerate();
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('pembelian');
                    break;
            }
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'nofound' => 'Email Atau Password Salah'
        ])->onlyInput('email');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenggunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenggunaRequest $request)
    {
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenggunaRequest  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenggunaRequest $request, Pengguna $pengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        //
    }
}
