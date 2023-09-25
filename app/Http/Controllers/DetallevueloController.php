<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detallevuelo;
use Illuminate\Validation\ValidationException;

class DetallevueloController extends Controller
{
    public function Historial($id)
    {
        try {

            $historial = Detallevuelo::with([
                'vuelo',
                'paquete.hotel.asociado',
                'paquete.restaurante.asociado',
                'paquete.transporte.asociado',
                'paquete.vuelo.destino.pais'
            ])->where('usu_id', $id)->get();
            
            $historial->map(function ($item) {
                if ($item->paq_id) {
                    unset($item['vuelo']);
                }else{
                    unset($item['paquete']);
                }
                return $item;
            });
            
            return response()->json($historial, 200);
        }catch (\Exception $e) {
            return response()->json($e , 500);
        }
    }

    public function HistorialPrueba($id)
    {
        try {
            $historial = Detallevuelo::with([
                'vuelo',
                'clase.destino.pais',
                'paquete.hotel.asociado',
                'paquete.restaurante.asociado',
                'paquete.transporte.asociado',
                'paquete.vuelo',
            ])->where('usu_id', $id)->get();
    
            if ($historial->isEmpty()) {
                return response()->json(['message' => 'No se encontraron vuelos para el usuario con id ' . $id], 404);
            }

            $historial->map(function ($item) {
                if ($item->paq_id) {
                    unset($item['paq_id']);
                    unset($item['vuelo']);
                    unset($item['vue_id']);
                    $item['vue_fecha'] = $item['paquete']['vuelo']['vue_fecha'];
                    $item['vue_hora'] = $item['paquete']['vuelo']['vue_hora'];
                    $item['clas_nombre'] = $item->clase->clas_nombre;
                    $item['precio'] = round($item->clase->clas_precio + $item->clase->destino->precio + $item['paquete']['hotel']['hot_precio'] + $item['paquete']['restaurante']['res_precio'] + $item['paquete']['transporte']['tra_precio'], 2);
                    $item['pais'] = $item->clase->destino->pais->nombre;
                    $item['hot_ubicacion'] = $item['paquete']['hotel']['hot_ubicacion'];
                    $item['res_ubicacion'] = $item['paquete']['restaurante']['res_ubicacion'];
                    $item['tra_ubicacion'] = $item['paquete']['transporte']['tra_ubicacion'];
                    unset($item['paquete']);
                    unset($item['clase']);
                    
                }else{
                    unset($item['paquete']);
                    unset($item['paq_id']);
                    $item['vue_fecha'] = $item['vuelo']['vue_fecha'];
                    $item['vue_hora'] = $item['vuelo']['vue_hora'];
                    $item['clas_nombre'] = $item->clase->clas_nombre;
                    $item['precio'] = $item->clase->clas_precio + $item->clase->destino->precio;
                    $item['pais'] = $item->clase->destino->pais->nombre;
                    $item['hot_ubicacion'] = null;
                    $item['res_ubicacion'] = null;
                    $item['tra_ubicacion'] = null;
                    unset($item['vuelo']);
                    unset($item['vue_id']);
                    unset($item['clase']);
                    
                }
                unset($item['usu_id']);
                return $item;
            });
    
    
            return response()->json($historial, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error interno del servidor'], 500);
        }
    }


    public function ComprarServicio(Request $request)
    {
        try {

            $request->validate([
                'userId' => 'required',
                'claseId' => 'required',
            ]);

            $saved = Detallevuelo::create([
                'vue_id' => $request->vueloId,
                'paq_id' => $request->paqueteId,
                'usu_id' => $request->userId,
                'clas_id' => $request->claseId,
            ]);

            return response()->json(['message' => 'la compra a sido exitosa'], 200);
            
        }catch (ValidationException $e){
            return response()->json($e->errors(), 400);

        } catch (\Exception $e) {
            return response()->json($e , 500);
            
        }
    }
}
