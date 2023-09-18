<?php

namespace App\Http\Controllers;
use App\Models\Entrada;
use App\Models\Historial;
use App\Models\Detallevuelo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EntradaController extends Controller
{
    public function comprarEntrada(Request $request)
    {
        try {
            $request->validate([
                'asiento' => 'required',
                'entrada_id' => 'required',
                'user_email' => 'required|email',
            ]);
            $user = User::where('user_email', $request->user_email)->first();
            // Agregar los datos en la tabla detallevuelo
            $detallevuelo = new Detallevuelo([
                'asiento' => $request->input('asiento'),
                'entrada_id' => $request->input('entrada_id'),
            ]);
            $detallevuelo->save();

            // Obtener el usuario con el correo electrónico proporcionado
            

            if ($user) {
                // Crear un registro en la tabla historial
                $historial = new Historial([
                    'user_id' => $user->id,
                    'detalle_id' => $detallevuelo->id,
                    'estado' => 1,
                ]);
                $historial->save();
            }else{
                return response()->json(['message' => 'no hay usuario',$user,$detallevuelo], 200);
            }
            return response()->json(['message' => 'la compra a sido exitosa',$user,$detallevuelo], 200);
        }catch (ValidationException $e){
            return response()->json($e->errors(), 400);
        } catch (\Exception $e) {
            return response()->json($e , 500);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entradas = Entrada::all();

        return response()->json($entradas, 200);
    }

    public function selectEntrada(Request $request)
    {
        //
        try {
            $request->validate([
                'entrada_id' =>'required',
            ]);
            
            $entrada = Entrada::where('id', $request->entrada_id)->first();

            if ($entrada) {
                return response()->json($entrada , 200);
            }else{
                return response()->json(['message' => 'no se encontro la entrada con el id',$request->entrada_id], 401);
            }
        }catch (ValidationException $e){
            return response()->json($e->errors(), 400);
        } catch (\Exception $e) {
            return response()->json($e , 500);
        }
    }

    public function selectUsuarioEntradas(Request $request)
    {
        try {
            // Encuentra al usuario por su correo electrónico
            $user = User::where('user_email', $request->user_email)->first();
            
            // Obtén todos los Detallevuelos relacionados con el usuario por su ID
            $historials = Historial::where('user_id', $user->id)->get();

            $detalles = [];
            $entradas = [];

            // Recorre los registros de Historial y obtén las entradas correspondientes
            foreach ($historials as $historial) {
                $detalleId = $historial->detalle_id;
                
                // Encuentra las entradas de Detallevuelo con el mismo detalle_id
                $historialDetalle = Detallevuelo::where('id', $detalleId)->first();
                $entradaId = $historialDetalle->entrada_id;
                $entradasDetalle = Entrada::where('id', $entradaId)->get();
                $entradas = array_merge($entradas, $entradasDetalle->toArray());
                // Agrega las entradas al array
                $detalles = array_merge($detalles, $historialDetalle->toArray());
            }

            return response()->json($entradas, 200);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
