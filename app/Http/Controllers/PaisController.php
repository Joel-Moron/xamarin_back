<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
class PaisController extends Controller
{
    public function getPaises()
    {
        try {
            $paises = Pais::all();

            if ($paises) {
                return response()->json($paises , 200);
            }else{
                return response()->json(['message' => 'no se encontraron paises'], 401);
            }

        }catch (\Exception $e) {
            return response()->json($e , 500);
        }
    }
}
