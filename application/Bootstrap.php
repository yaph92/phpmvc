<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Bootstrap
{
    public static function run(Request $peticion)
    {
        $controller = $peticion->getControlador() . 'Controller';
        $rutacontrolador = ROOT . 'controllers' . DS . $controller . '.php';
        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();
        
        if (is_readable($rutacontrolador)){
            require_once $rutacontrolador;
            $controller = new $controller;
            
            if(is_callable(array($controller, $metodo))){
                
                $metodo = $peticion->getMetodo();
            }
            else {
                $metodo = 'index';
            }
            
            if(isset($args)){
                call_user_func_array(array($controller, $metodo), $args);
            }
            else {
                call_user_func(array($controller, $metodo));
            }
            
        }  else {
            throw new Exception('no encontrado');
        }
    }        
}



?>