<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;

class PaqueteController extends Controller
{
    public function getPaquetes()
    {
        
        try {
            //$paquetes = Paquete_asociado::with('paquete.entrada', 'asociadoTipoServicio.asociado', 'asociadoTipoServicio.tiposervicio')->get();
            $paquete = Paquete::with('vuelo.destino.pais')->get();

            if ($paquete) {
                return response()->json($paquete , 200);
            }else{
                return response()->json(['message' => 'no se encontraron vuelos',$paquete], 401);
            }
        }catch (\Exception $e) {
            return response()->json($e , 500);
        }
    }

    public function getPaquetesPais($id)
    {
        try {

            $paquetes = Paquete::whereHas('vuelo.destino.pais', function ($query) use ($id) {
                $query->where('id', $id);
            })->with('vuelo.asientos','vuelo.destino.pais','vuelo.destino.clase','hotel.asociado', 'restaurante.asociado','transporte.asociado')->get();


            $data = $paquetes->map(function ($item) use ($id) {
                // Verificamos si $item->destino es un array
                if ($item->vuelo->destino) {
                    // Filtramos los elementos dentro del array destino
                    $des = collect($item->vuelo->destino)->filter(function ($destino) use ($id) {
                        // Comparamos el ID del país en cada elemento con $id
                        return $destino['pais']['id'] == $id;
                    });
    
                    // Verificamos si $des contiene elementos
                    if ($des->isNotEmpty()) {
                        $firstDes = $des->first();
                        $item['pais'] = $firstDes->pais->nombre;
                        $item['precio'] = $firstDes->precio;
                        //$item['clase'] = $firstDes->clase;
                        $item['claseProbre'] = round(($firstDes->clase[0]['clas_precio'] + $firstDes->precio + $item->hotel->hot_precio + $item->restaurante->res_precio + $item->transporte->tra_precio) /* * ($item->descuento/100) */, 2);
                        $item['claseProbreId'] = $firstDes->clase[0]['id'];
                        $item['claseVip'] = round(($firstDes->clase[1]['clas_precio'] + $firstDes->precio + $item->hotel->hot_precio + $item->restaurante->res_precio + $item->transporte->tra_precio) /* * ($item->descuento/100) */, 2);
                        $item['claseVipId'] = $firstDes->clase[1]['id'];
                        $item['claseFachero'] = round(($firstDes->clase[2]['clas_precio'] + $firstDes->precio + $item->hotel->hot_precio + $item->restaurante->res_precio + $item->transporte->tra_precio) /* * ($item->descuento/100) */, 2);
                        $item['claseFacheroId'] = $firstDes->clase[2]['id'];
                        $item['hot_ubicacion'] = $item['hotel']['hot_ubicacion'];
                        $item['res_ubicacion'] = $item['restaurante']['res_ubicacion'];
                        $item['tra_ubicacion'] = $item['transporte']['tra_ubicacion'];
                        unset($item['hotel']);
                        unset($item['restaurante']);
                        unset($item['transporte']);
                        $item['asientos'] = $item->vuelo->asientos;
                    } else {
                        // Manejamos el caso en que $des esté vacío
                        $item['pais'] = null;
                        $item['precio'] = null;
                        $item['clase'] = null;
                    }
    
                    // Eliminamos la propiedad destino
                    unset($item['vuelo']);
                    unset($item['hot_id']);
                    unset($item['tra_id']);
                    unset($item['vue_id']);
                    unset($item['res_id']);
                    unset($item['descuento']);
                }
    
                return $item;
            });
            if ($paquetes) {
                return response()->json($data , 200);
            }else{
                return response()->json(['message' => 'no se encontraron vuelos',$paquete], 401);
            }
            
        }catch (\Exception $e) {
            return response()->json($e , 500);
        }
    }
}
