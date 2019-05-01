<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class controladorPagina extends Controller
{
    //
    public function index(){

    }

    public function inicio(){
    return "Inicio";
    }
    public function postLogin(Request $request){
        $usuario=App\Usuarios::where('email',$request->email);
        $response['error'] = 'error en usuario o en password';
        $resultado= $response;
    
        if(sizeof($usuario)!=0)
        {
            if($usuario->password==$request->password)
            {
                session_start();
                $_SESSION["usuario"]=1;
                $resultado= $usuario;
            };
        };
        
        return json_encode($resultado);
    }
    public function postUser(Request $request){
        $usuario= new Usuarios;
        $usuario->first_name=$request->first_name;
        $usuario->last_name=$request->last_name;
        $usuario->email=$request->email;
        $usuario->password=$request->password;
        $usuario->save();
        return "";
    }
    public function putUserid(Request $request, $id){
        $usuario=App\Usuarios::find($id);
        $usuario->first_name=$request->first_name;
        $usuario->last_name=$request->last_name;
        $usuario->email=$request->email;
        $usuario->password=$request->password;
        $usuario->save();
        return "";
    }
    public function deleteUserid($id){
        $usuario=App\Usuarios::find($id);
        $usuario->delete();
        return "";
    }
    public function getUserid($id="*"){
        
        if($id=="*"){
            $todos=App\Usuarios::all();
            return json_encode($todos);
        }
        else{
            $usuario=App\Usuarios::find($id);
            return json_encode($usuario);
        }
    }

}
