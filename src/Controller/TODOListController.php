<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TODOListController extends AbstractController {

    #[Route("/tareas", methods:["GET"])]
    public function getTareas() {
        $tareas = [ "tareas" =>
            [
                [
                "name" => "proyecto php",
                "descripcion" => "hacer proyecto php esta semana",
                "estado" => "hecho",
                "identificador" => 1                    
                ],
                [
                "name" => "recoger entradas",
                "descripcion" => "recoger entradas del concierto",
                "estado" => "",
                "identificador" => 2                    
                ],               
            ]
        ];

        return new JsonResponse($tareas); 
    }


    #[Route("/tareas/{id}", methods:["GET"])]
    public function getTareById($id) {
        $tareas = [ "tareas" =>
            [
                [
                "name" => "proyecto php",
                "descripcion" => "hacer proyecto php esta semana",
                "estado" => "hecho",
                "identificador" => 1                    
                ],
                [
                "name" => "recoger entradas",
                "descripcion" => "recoger entradas del concierto",
                "estado" => "",
                "identificador" => 2                    
                ],               
            ]
        ];

        foreach ($tareas["tareas"] as $key => $tarea) {
            if ($tarea["identificador"] == $id) {
                $tareaSelected = $tarea;
                return new JsonResponse($tareaSelected); 

            }
        };

        if (empty($tareaSelected)) {
            return new Response(content: "Tarea no existe", status: 404); 
        }
    }


    #[Route("/tareas/{id}", methods:["DELETE"])]
    public function deleteTareById($id) {
        $tareas = [ "tareas" =>
            [
                [
                "name" => "proyecto php",
                "descripcion" => "hacer proyecto php esta semana",
                "estado" => "hecho",
                "identificador" => 1                    
                ],
                [
                "name" => "recoger entradas",
                "descripcion" => "recoger entradas del concierto",
                "estado" => "",
                "identificador" => 2                    
                ],               
            ]
        ];

        try {
            foreach ($tareas["tareas"] as $key => $tarea) {
                if ($tarea["identificador"] == $id) {
                    $tareaSelected = $tarea;
                    return new Response(content:"tarea borrada"); 
                }
            };

            if (empty($tareaSelected)) {
                return new Response(content: "Tarea no encontrada", status: 404); 
            }
        } catch (\Throwable $th) {
            return new Response(content: "Error al borrar la tarea", status: 500); 
        }
    }


    
    #[Route("/tareas/{id}", methods:["PUT"])]
    public function putTareById($id, $nombre, $descripcion) {
        $tareas = [ "tareas" =>
            [
                [
                "name" => "proyecto php",
                "descripcion" => "hacer proyecto php esta semana",
                "estado" => "hecho",
                "identificador" => 1                    
                ],
                [
                "name" => "recoger entradas",
                "descripcion" => "recoger entradas del concierto",
                "estado" => "",
                "identificador" => 2                    
                ],               
            ]
        ];

        try {
            foreach ($tareas["tareas"] as $key => $tarea) {
                if ($tarea["identificador"] == $id) {
                    $tarea["nombre"] = $nombre;
                    $tarea["descripcion"] = $descripcion;
                    return new Response(content:"tarea modificada"); 
                }
            };

        } catch (\Throwable $th) {
            return new Response(content: "Error al modificar la tarea", status: 500); 
        }
    }


        
    #[Route("/tareas/{id}/done", methods:["GET"])]
    public function getTareaDone($id) {
        $tareas = [ "tareas" =>
            [
                [
                "name" => "proyecto php",
                "descripcion" => "hacer proyecto php esta semana",
                "estado" => "hecho",
                "identificador" => 1                    
                ],
                [
                "name" => "recoger entradas",
                "descripcion" => "recoger entradas del concierto",
                "estado" => "",
                "identificador" => 2                    
                ],               
            ]
        ];

        try {
            foreach ($tareas["tareas"] as $key => $tarea) {
                if ($tarea["identificador"] == $id) {
                    $tarea["estado"] = "hecho";
                    return new Response(content:"tarea hecha"); 
                }
            };

        } catch (\Throwable $th) {
            return new Response(content: "Error al modificar la tarea", status: 500); 
        }
    }



    #[Route("/tareas/{id}/undone", methods:["GET"])]
    public function getTareaUnDone($id) {
        $tareas = [ "tareas" =>
            [
                [
                "name" => "proyecto php",
                "descripcion" => "hacer proyecto php esta semana",
                "estado" => "hecho",
                "identificador" => 1                    
                ],
                [
                "name" => "recoger entradas",
                "descripcion" => "recoger entradas del concierto",
                "estado" => "",
                "identificador" => 2                    
                ],               
            ]
        ];

        try {
            foreach ($tareas["tareas"] as $key => $tarea) {
                if ($tarea["identificador"] == $id) {
                    $tarea["estado"] = "";
                    return new Response(content:"tarea no hecha"); 
                }
            };

        } catch (\Throwable $th) {
            return new Response(content: "Error al modificar la tarea", status: 500); 
        }
    }
}


