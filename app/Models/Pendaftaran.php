<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $fillable = [
    	'tahun_ajaran_id','prodi_id', 'nik', 'nisn', 'nama_lengkap', 'no_hp', 'email', 'jenis_kelamin', 'tempat_lahir', 
    	'tanggal_lahir','agama', 'ibu_kandung', 'dusun', 'desa', 'kecamatan', 'kabupaten', 'status'
    ];

    public function prodi()
    {
    	return $this->belongsTo(Prodi::Class);
    }

    public function tahun_ajaran()
    {
    	return $this->belongsTo(TahunAjaran::Class);
    }
}
