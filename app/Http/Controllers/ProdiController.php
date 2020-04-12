<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;
use Validator;

class ProdiController extends Controller
{

    public function index()
    {
    	$prodi = Prodi::All();

    	$response = [
    		'status' => 'success',
    		'message' => 'Berhasil menampilkan data prodi',
    		'data' => $prodi
    	];
    	
    	return response($response, 201);
    }

    public function addProdi(Request $request)
    {
    	$validator = $this->validation($request->all());
    	$nama = $request->nama;

    	if($validator->passes()){
    		$prodi = Prodi::create([
    			'nama' => $nama
    		]);
    		$response = response()->json([
    			'status' => 'success',
    			'message' => 'Tambah Prodi Berhasil...',
    			'data' => $prodi
    		], 201);
    	}else{
    		$response = response()->json([
    			'status' => 'error',
    			'message' => 'Gagal menambahkan prodi',
    			'data' => $validator->errors()->all()
    		], 401);
    	}
    	return $response;
    }

    public function updateProdi(Request $request, $id)
    {
    	$validator = $this->validation($request->all());
    	
    	$nama = $request->nama;

    	if($validator->passes()){
    		$prodi = Prodi::find($id);
    		$prodi->nama = $nama;
    		$prodi->save();
    		$response = response()->json([
    			'status' => 'success',
    			'message' => 'Prodi berhasil diperbarui...',
    			'data' => $prodi
    		], 201);
    	}else{
    		$response = response()->json([
    			'status' => 'error',
    			'message' => 'Gagal memperbarui prodi',
    			'data' => $validator->errors()->all()
    		], 401);
    	}
    	return $response;
    }

    private function validation($request){
    	$validator = Validator::make($request, [
    		'nama' => 'required|min:3|max:100'
    	],[
    		'nama.required' => 'Parameter nama tidak boleh kosong',
    		'nama.min' => 'Nama minimal harus 3 karakter',
    	]);

    	return $validator;
    }
}
