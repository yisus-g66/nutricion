<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;
class ServicioController extends Controller
{
    //
    public function index(Request $request)
    {
        $tipo = $request->get('tipo');
        $buscar = $request->get('buscar');
        if (empty($tipo)) {
        $tipo = "serv_name";
        }elseif($tipo =="Buscar por"){
            $tipo="serv_name";
            $buscar="";
        }
        $data = DB::table('tbl_servicio')
            ->select(
                'tbl_servicio.*'
            )
            ->Where('tbl_servicio.'.$tipo.'', 'like', '%' . $buscar . '%')
            ->orderBy('tbl_servicio.serv_id', 'asc')
            ->paginate(5);
        // return dd($data);
        // $data = Admin::All();        
        return view('servicio.index', compact('data', 'buscar','tipo'));
        // return view('estudiante.index');
    }
}
