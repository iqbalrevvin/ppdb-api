<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaran;

class TahunAjaranController extends Controller
{
    public function index()
    {
    	$tahun_ajaran = TahunAjaran::All();
    	$response = response()->json([
    			'status' => 'success',
    			'message' => 'List tahun ajaran...',
    			'data' => $tahun_ajaran
    		], 201);

    	return $response;
    }
}
