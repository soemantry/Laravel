<?php

namespace App\Http\Controllers;

use App\Share;
use Illuminate\Http\Request;

class Form_Control extends Controller
{
    public function index(){
    	$data = Share::all()->toArray();
        return view('awal', compact('data'));
    }

    public function create(){
    	return view('tambah');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
      	  'id'         =>  'required',
          'judul'         =>  'required',
          'kategori'      =>  'required',
          'tahunTerbit'   =>  'required',
          'penerbit'      =>  'required'
      ]);
      $data = new Share([
      	  'id'         =>  $request->get('id'),
          'judul'         =>  $request->get('judul'),
          'kategori'      =>  $request->get('kategori'),
          'tahunTerbit'   =>  $request->get('tahunTerbit'),
          'penerbit'      =>  $request->get('penerbit')
      ]);
      $data->save();
      return redirect()->route('input.create')->with('success', 'Data Added');
    }

    public function edit($id)
    {
        $data = Share::find($id);
        return view('edit', compact('data', 'id'));
    }

    public function destroy($id)
    {
      $data = Share::find($id);
      $data->delete();
      return redirect()->route('input.index')->with('success', 'Data Deleted');
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
      	  'id'         =>  'required',
          'judul'         =>  'required',
          'kategori'      =>  'required',
          'tahunTerbit'   =>  'required',
          'penerbit'      =>  'required'
      ]);
      $data = Share::find($id);
      $data->id=$request->get('id');
      $data->judul=$request->get('judul');
      $data->kategori=$request->get('kategori');
      $data->tahunTerbit=$request->get('tahunTerbit');
      $data->penerbit=$request->get('penerbit');
      $data->save();
      return redirect()->route('input.index')->with('success', 'Data Updated');
    }

}

?>