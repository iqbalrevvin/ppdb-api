<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Pendaftaran;
use App\Models\TahunAjaran;

class PendaftaranController extends Controller
{
    public function index()
    {
    	return 'Hello..';
    }

    public function create(Request $request)
    {
    	$validator = $this->validation($request->all());

    	$tahun_ajaran_aktif = TahunAjaran::where('status', 'Aktif')->first()->id;

    	if($validator->passes()){
    		$pendaftaran = Pendaftaran::create([
    			'tahun_ajaran_id' => $tahun_ajaran_aktif,
	    		'prodi_id' 		=> $request->prodi_id,
	    		'nik' 			=> $request->nik,
	    		'nisn' 			=> $request->nisn,
	    		'nama_lengkap' 	=> $request->nama_lengkap,
	    		'no_hp' 		=> $request->no_hp,
	    		'email' 		=> $request->email,
	    		'jenis_kelamin' => $request->jenis_kelamin,
	    		'tempat_lahir' 	=> $request->tempat_lahir,
	    		'tanggal_lahir' => $request->tanggal_lahir,
	    		'agama' 		=> $request->agama,
	    		'ibu_kandung' 	=> $request->ibu_kandung,
	    		'dusun' 		=> $request->dusun,
	    		'desa' 			=> $request->desa,
	    		'kecamatan' 	=> $request->kecamatan,
	    		'kabupaten' 	=> $request->kabupaten,    		
	    	]);
	    	$response = response()->json([
    			'status' => 'success',
    			'message' => 'Terimakasih, pendaftaran anda berhasil, informasi selanjutnya akan di informasikan oleh pihak sekolah melalui No. Hp yang anda isi.',
    			'data' => $pendaftaran
	    	],201);
    	}else{
    		$response = response()->json([
    			'status' => 'error',
    			'message' => 'Pendaftaran Gagal...',
    			'data' => $validator->errors()->all()
	    	],401);
    	}

    	return $response;
    }

    private function validation($request){
    	$validator = validator::make($request, [
    		'prodi_id' 		=> 'required',
    		'nik' 			=> 'required|unique:pendaftaran|min:16|max:16',
    		'nisn' 			=> 'required|unique:pendaftaran|min:10|max:10',
    		'nama_lengkap' 	=> 'required|min:3|max:100',
    		'no_hp' 		=> 'required|unique:pendaftaran|min:10|max:15',
    		'email' 		=> 'max:100',
    		'jenis_kelamin' => 'required|max:10',
    		'tempat_lahir' 	=> 'required|max:50',
    		'tanggal_lahir' => 'required|date',
    		'agama' 		=> 'max:10',
    		'ibu_kandung' 	=> 'max:100',
    		'dusun' 		=> 'max:100',
    		'desa' 			=> 'max:100',
    		'kecamatan' 	=> 'max:100',
    		'kabupaten' 	=> 'max:100'
    	],[
    		'prodi_id.required' 		=> 'Tujuan Program Studi belum di pilih!',
    		'nik.required' 				=> 'NIK tidak boleh kosong',
    		'nik.unique' 				=> 'NIK pernah di daftarkan sebelumnya!',
    		'nik.min' 					=> 'Minimal isian NIK harus 16 digit',
    		'nik.max' 					=> 'Maksimal isian NIK harus 16 digit',
    		'nisn.required' 			=> 'NISN tidak boleh kosong',
    		'nisn.unique' 				=> 'NISN pernah di daftarkan sebelumnya!',
    		'nisn.min' 					=> 'Minimal isian NISN harus 10 digit',
    		'nisn.max' 					=> 'Maksimal isian NISN harus 10 digit',
    		'nama_lengkap.required' 	=> 'Nama Lengkap tidak boleh kosong',
    		'nama_lengkap.min' 			=> 'Nama Lengkap tidak minimal 3 karakter',
    		'nama_lengkap.max' 			=> 'Nama Lengkap tidak maksimal 100 karakter',
    		'no_hp.required' 			=> 'No. Hp tidak boleh kosong',
    		'no_hp.unique' 				=> 'No. HP pernah di daftarkan sebelumnya!',
    		'no_hp.min' 				=> 'Minimal isian No. Hp harus 10 digit',
    		'no_hp.max' 				=> 'Maksimal isian No. Hp harus 15 digit',
    		'jenis_kelamin.required' 	=> 'Jenis Kelamin belum di isi!',
    		'tempat_lahir.required' 	=> 'Tempat lahir belum di isi!',
    		'tanggal_lahir.required' 	=> 'Tanggal lahir belum di isi!',
    		'tanggal_lahir.date' 	=> 'Format tanggal lahir salah!'
    	]);

    	return $validator;
    }
}
