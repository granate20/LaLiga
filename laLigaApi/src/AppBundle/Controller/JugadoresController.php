<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Jugadores;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Equipos;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;


/**
 * Jugadore controller.
 *
 */
class JugadoresController extends Controller
{
    /**
     * Lists all jugadore entities.
     *
     */
    public function getPlayersByTeamAction(Equipos $equipo=null)
    {
        try
        {
            if($equipo==null)
                    return "Error";
                    
            $em = $this->getDoctrine()->getManager();
    
            return $em->getRepository('AppBundle:Jugadores')->findByEquipos($equipo);
        }
        catch(\Exception $ex)
        {
            throw $this->createNotFoundException('Error al mostrar jugadores');
        }
    }

    /**
     * New jugadore entities.
     *
     */
    public function newPlayerToTeamAction(Equipos $equipo=null,Request $request)
    {
        try
        {
            if($equipo==null)
                    return "Error";
    
            $em = $this->getDoctrine()->getManager();
                    
            $jugador= $this->nuevoJuegadorFromPost($request->request,$equipo);
    
            $em->persist($jugador);
            $em->flush($jugador);
    
            return $jugador;   
        } 
        catch(\Exception $ex)
        {
            throw $this->createNotFoundException('Error al crear el jugador');
        }    
    }

    private function nuevoJuegadorFromPost($postPlayer,$equipo)
    {
        $jugador= new Jugadores();
        $jugador->setNombre($postPlayer->get('nombre'));
        $jugador->setApellido($postPlayer->get('apellido'));
        $jugador->setEquipos($equipo);
        return $jugador;
    }
}
