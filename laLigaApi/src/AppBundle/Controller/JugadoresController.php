<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Jugadores;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        return $em->getRepository('AppBundle:Jugadores')->findBy([],["apellido"=>"asc"]);
    }
}
