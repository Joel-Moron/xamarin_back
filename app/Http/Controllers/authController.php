<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class authController extends Controller
{
    public function login(Request $request)
    {
        
        try {
            $request->validate([
                'username' =>'required',
                'password' => 'required'
            ]);
            
            $user = User::where('user_email', $request->username)->first();

            if ($user && Hash::check($request->password, $user->user_password)) {

                $date = date('Y-m-d H:i:s');
                $dateDiff = strtotime($date) - strtotime($user->date_token);
                //$meses = floor($dateDiff / (30 * 24 * 60 * 60));
                $semanas = floor($dateDiff / (7 * 24 * 60 * 60));

                if ($semanas > 1 || $user->date_token == null) {
                    $token = bin2hex(openssl_random_pseudo_bytes(16,$val));
                    $user -> update(['user_token' => $token, 'date_token' => $date]);
                }
                //excluir contraseña
                unset($user['user_password']);

                return response()->json($user , 200);
            }else{
                return response()->json(['message' => 'Credenciales incorrectas',$user,$request], 401);
            }
        }catch (ValidationException $e){
            return response()->json($e->errors(), 400);
        } catch (\Exception $e) {
            return response()->json($e , 500);
        }

    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'email' => 'required',
                'password' => 'required|string|min:6',
                'app' => 'required|string',
                'apm' => 'required|string',
                'dni' => 'required|max:8|min:8',
            ]);

            $user = User::create([
                'user_name' => $request->nombre,
                'user_email' => $request->email,
                'user_password' => Hash::make($request->password),
                'user_dni' => $request->dni,
                'user_app' => $request->app,
                'user_apm' => $request->apm
            ],[]);
            return response()->json(['data' => 'usuario creado correctamente', 'user' => $user], 200);
        }catch (ValidationException $e){
            return response()->json($e->errors(), 400);
        }
        catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el usuario',$e], 500);
        }
    }
}
