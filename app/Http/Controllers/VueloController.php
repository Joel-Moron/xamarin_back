<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vuelo;
use Illuminate\Validation\ValidationException;

class VueloController extends Controller
{
    public function getVuelos()
    {
        try {
            //$paquetes = Paquete_asociado::with('paquete.entrada', 'asociadoTipoServicio.asociado', 'asociadoTipoServicio.tiposervicio')->get();
            $vuelo = Vuelo::with('destino.clase', 'destino.pais','asientos')->get();

            if ($vuelo) {
                return response()->json($vuelo , 200);
            }else{
                return response()->json(['message' => 'no se encontraron vuelos',$vuelo], 401);
            }
        }catch (ValidationException $e){
            return response()->json($e->errors(), 400);
        } catch (\Exception $e) {
            return response()->json($e , 500);
        }
    }


    public function getVuelosPais($id)
    {
        try {
            // Usar la función preg_match para extraer el número entre llaves
        /*  if (preg_match('/{(\d+)}/', $id, $matches)) {
                // $matches[1] contendrá el número extraído
                $id = (int)$matches[1];
            } else {
                return response()->json(['message' => 'No se pudo extraer el id'], 500);
            } */

            $vuelos = Vuelo::whereHas('destino.pais', function ($query) use ($id) {
                $query->where('id', $id);
            })->with('destino.clase', 'destino.pais', 'asientos')->get();
    
            if ($vuelos->isEmpty()) {
                return response()->json(['message' => 'No se encontraron vuelos para el país con ID ' . $id], 404);
            }
    
            $data = $vuelos->map(function ($item) use ($id) {
                // Verificamos si $item->destino es un array
                if ($item->destino) {
                    // Filtramos los elementos dentro del array destino
                    $des = collect($item->destino)->filter(function ($destino) use ($id) {
                        // Comparamos el ID del país en cada elemento con $id
                        return $destino['pais']['id'] == $id;
                    });
    
                    // Verificamos si $des contiene elementos
                    if ($des->isNotEmpty()) {
                        $firstDes = $des->first();
                        $item['pais'] = $firstDes->pais->nombre;
                        $item['precio'] = $firstDes->precio;
                        //$item['clase'] = $firstDes->clase;
                        $item['claseProbre'] = $firstDes->clase[0]['clas_precio'] + $firstDes->precio;
                        $item['claseProbreId'] = $firstDes->clase[0]['id'];
                        $item['claseVip'] = $firstDes->clase[1]['clas_precio'] + $firstDes->precio;
                        $item['claseVipId'] = $firstDes->clase[1]['id'];
                        $item['claseFachero'] = $firstDes->clase[2]['clas_precio'] + $firstDes->precio;
                        $item['claseFacheroId'] = $firstDes->clase[2]['id'];
                    } else {
                        // Manejamos el caso en que $des esté vacío
                        $item['pais'] = null;
                        $item['precio'] = null;
                        $item['clase'] = null;
                    }
    
                    // Eliminamos la propiedad destino
                    unset($item['destino']);
                }
    
                return $item;
            });
    
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error interno del servidor'], 500);
        }
    }

}
