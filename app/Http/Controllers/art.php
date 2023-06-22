<?php

namespace App\Http\Controllers;

use App\Models\update_img;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class art extends Controller
{
    public function img_guardar(Request $request){
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();
            $imagen->move(public_path('img/img_web'), $nombreImagen);
            $urlImagen = asset('img/img_web/'.$nombreImagen);

            $datos = new update_img();
            $datos->nombre_url     = $nombreImagen;
            $datos->nombre_descrip = $request->NOMBRE;
            $datos->etiqueta       = $request->ETIQUETA;
            $datos->descripcion    = $request->DESCRIPCION;
            $datos->fecha          = date('Y-m-d');
            $datos->save();

            return response()->json([
                'mensaje' => 'Imagen guardada correctamente',
                'BD' => 'se guardo la info en db'
            ]);
        }else{
            return response()->json(['error' => 'No se ha enviado ninguna imagen'], 400);
        }
    }
    public function datos_img_catalogo(Request $request)
    {   
        $TABLA = DB::table('datos_img')
            ->get();
        return json_encode($TABLA);
    }
    public function eliminar_img_catalogo(Request $request)
    {   
        
        $deleted = DB::table('datos_img')
        ->where('id','=', $request['id'])
        ->delete();

        $path_imagen = public_path('img/img_web/'.$request['name'].'');
        unlink($path_imagen);    
        return json_encode([
            'delete'=> $deleted,
            'img'=> $path_imagen,
        ]);
    }

    public function cantidad_img_carrusel(){
        $TABLA = DB::table('carrusel')
            ->get();
        return json_encode($TABLA);
    }

    public function img_carrusel(Request $request){
        
        if ($request->hasFile('imagen')){

            $imagen = $request->file('imagen');
            $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();
            $imagen->move(public_path('img/img_carrusel'), $nombreImagen);
            $urlImagen = asset('img/img_carrusel/'.$nombreImagen);

            DB::table('carrusel')
            ->insert([
                'nombre_img' => $nombreImagen,
                'fecha'      => date('Y-m-d'),
            ]);

            return response()->json([
                'mensaje' => 'Imagen guardada correctamente',
                'BD'      => 'se guardo la info en db'
            ]);
        }else{
            return response()->json([
                'error' => 'No se ha enviado ninguna imagen'
            ], 400);
        }
    }
    public function datos_img_carrusel(Request $request)
    {   
        $TABLA = DB::table('carrusel')
            ->get();
        return json_encode($TABLA);
    }
    public function eliminar_img_carrusel(Request $request)
    {   
        
        $deleted = DB::table('carrusel')
        ->where('id','=', $request['id'])
        ->delete();

        $path_imagen = public_path('img/img_carrusel/'.$request['name'].'');
        unlink($path_imagen);    
        return json_encode([
            'delete'=> $deleted,
            'img'=> $path_imagen,
        ]);
    }
    public function datos_por_id(Request $request)
    {   
        $TABLA = DB::table('datos_img')
            ->where('id', '=' , $request->id)
            ->first();
        return json_encode($TABLA);
    }

    public function UPDATE_IMG_DATOS(Request $request){

        DB::table('datos_img')
        ->where('id','=', $request->id)
        ->update([
            'nombre_descrip' => $request->nombre_art,
            'etiqueta'       => $request->etiqueta_artid,
            'descripcion'    => $request->descripcion_art,
        ]);
        return json_encode(true);
    }
}
