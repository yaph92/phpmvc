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
        
        echo $rutacontrolador;exit;
    }        
}



?>