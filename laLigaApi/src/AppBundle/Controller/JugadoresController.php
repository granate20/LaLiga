<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Jugadores;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Equipos;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


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
        if($equipo==null)
                return "Error";
                
        $em = $this->getDoctrine()->getManager();

        return $em->getRepository('AppBundle:Jugadores')->findOneByEquipo($equipo);
    }

    /**
     * New jugadore entities.
     *
     */
    public function newPlayerToTeamAction(Equipos $equipo=null,Jugadores $jugador)
    {
        if($equipo==null)
                return "Error";
                
        $jugador= $this->nuevoJuegadorFromPost($request->request,$equipo);
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
