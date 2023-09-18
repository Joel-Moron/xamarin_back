<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use App\Models\Paquete;
use App\Models\Paquete_asociado;

class PaqueteController extends Controller
{
    //
    public function selectPaquete()
    {
        //
        $paquetes = Paquete_asociado::with('paquete.entrada', 'asociadoTipoServicio.asociado', 'asociadoTipoServicio.tiposervicio')->get();

        return response()->json($paquetes, 200);
    }
}
