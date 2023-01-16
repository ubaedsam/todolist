<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Pelajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelajars = Pelajar::all();
        return view('pelajar', compact('pelajars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('add_pelajar', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $pelajar = Pelajar::create($data);
        foreach($request->hobi as $hb){
            $hobi[] = ['hobi' => $hb];
        }
        $pelajar->hobis()->createMany($hobi);
        return redirect('pelajar')->with('success','Data pelajar berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelajar = Pelajar::findOrFail($id);
        $jurusans = Jurusan::all();
        return view('edit_pelajar',['pelajar' => $pelajar, 'jurusans' => $jurusans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Pelajar $pelajar)
    {
        $pelajar = Pelajar::findOrFail($id);
        $pelajar->nama = $request->nama;
        $pelajar->jk = $request->jk;
        $pelajar->jurusan_id = $request->jurusan_id;
        $pelajar->save();

        if(count($pelajar->hobis) == 0){
            foreach($request->hobi as $hb){
                $pelajar->hobis()->create(['hobi' => $hb]);
            }
        }else{
            $pelajar->hobis()->delete();
            $hobi = [];
            foreach($request->hobi as $hb){
                $hobi[] = ['hobi' => $hb];
            }
            $pelajar->hobis()->createMany($hobi);
        }
        return redirect()->route('pelajar')->with('success','Data pelajar berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelajar $pelajar, $id)
    {
        $pelajar = Pelajar::find($id);

        $pelajar->delete();
        return redirect()->back()->with('success','Data pelajar berhasil dihapus!');
    }
}
