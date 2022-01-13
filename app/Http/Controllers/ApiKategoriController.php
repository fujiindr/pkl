<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class ApiKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::where('nama_kategori', 'Bola Voli')
        ->get();

        if ($kategori->count() >= 1){
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'berhasil',
                'data' => $kategori,
            ]);
        }else{
            return response()->json([
                'status' => false,
                'code' => 404,
                'message' => 'gagal',
            ]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = new kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Kategori Berhasil dibuat',
            'data' => $kategori,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = kategori::find($id);
        if ($kategori){
            return response()->json([
                'success' => true,
                'message' => 'Show Data kategori',
                'data' => $kategori,
            ], 201);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data kategori tidak ditemukan',
                'data' => [],
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $kategori = kategori::find($id);
        if ($kategori){
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->save();
            return response()->json([
                'success' => true,
                'message' => 'Data kategori Berhasil dibuat',
                'data' => $kategori,
            ], 201);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data kategori tidak ditemukan',
                'data' => [],
            ], 404);
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
        $kategori = kategori::find($id);
        if ($kategori){
            $kategori->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data kategori Berhasil dihapus',
                'data' => $kategori,
            ], 201);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data kategori tidak ditemukan',
                'data' => [],
            ], 404);
        }
    }
}
