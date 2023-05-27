<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $register = Register::orderBy('id', 'desc')->get();
        return view('show-data', compact('register'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $aturan_validasi = [
        //     'nik' => 'required | max:16',
        //     'nama' => 'required | min:3 | max: 20',
        //     'email' => 'required | email',
        //     'gender' => 'required | in:P,L',
        //     'jurusan' => 'required',
        //     'alamat' => ''
        // ];
        // $pesan_error = [
        //     'required' => ':attribute wajib di isi!',
        //     'max' => ':attribute maksimal :max karakter',
        //     'min' => ':attribute minimal :min karakter',
        //     'email' => ':attribute wajib dengan alamat email yang valid',
        //     'in' => ':attribute yang dipilih tidak valid'
        // ];
        // $validator = Validator::make($request->all(), $aturan_validasi, $pesan_error);
        // if ($validator->fails()) {
        //     return redirect('/halaman-pendaftaran')->withErrors($validator)->withInput();
        // } else {
        //     dump($validator);
        // }
        $validateData = $request->validate([
            'nik' => 'required | min:14 |max:16',
            'nama' => 'required | min:3 |max: 20',
            'email' => 'required | email',
            'gender' => 'required | in:P,L',
            'jurusan' => 'required',
            'alamat' => ''
        ]);
        Register::create($validateData);
        return redirect()->route('show-data')->with('message', 'Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $register = Register::find($id);
        return view('edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nik' => 'required | min:14 |max:16',
            'nama' => 'required | min:3 |max: 20',
            'email' => 'required | email',
            'gender' => 'required | in:P,L',
            'jurusan' => 'required',
            'alamat' => ''
        ]);
        // $register->update($validateData);
        Register::where('id', $id)->update($validateData);
        return redirect()->route('show-data')->with('update', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $register = Register::find($id);
        $register->delete();
        return redirect()->route('show-data')->with('hapus', 'data berhasil dihapus');
    }
}
