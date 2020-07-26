<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;

class KarwayanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Karyawan::all();
        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'status_karyawan' => 'required',
            'total_motor' => 'required',
            'penghasilan' => 'required',
            'alamat' => 'required',
            'user_id' => 'required',
        ]);
        $data = Karyawan::create($request->all());

        return response()->json([
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Karyawan::find($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status_karyawan' => 'required',
            'total_motor' => 'required',
            'penghasilan' => 'required',
            'alamat' => 'required',
            'user_id' => 'required',
        ]);

        $data = Karyawan::where('id', $id)->update([
            'status_karyawan' => $request->status_karyawan,
            'total_motor' => $request->total_motor,
            'penghasilan' => $request->penghasilan,
            'alamat' => $request->alamat,
            'user_id' => $request->user_id
        ]);

        if ($data) {
            return response()->json([
                'message' => 'Data berhasil diubah'
            ]);
        } else {
            return response()->json([
                'message' => 'Data berhasil gagal diubah'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Karyawan::destroy($id);

        if ($data) {
            return response()->json([
                'message' => 'Data berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'message' => 'Data berhasil gagal dihapus'
            ]);
        }
    }
}
