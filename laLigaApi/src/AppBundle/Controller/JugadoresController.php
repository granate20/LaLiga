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

        $jugadores = $em->getRepository('AppBundle:Jugadores')->findAll();

        return $this->render('jugadores/index.html.twig', array(
            'jugadores' => $jugadores,
        ));
    }

    /**
     * Finds and displays a jugadore entity.
     *
     */
    public function showAction(Jugadores $jugadore)
    {

        return $this->render('jugadores/show.html.twig', array(
            'jugadore' => $jugadore,
        ));
    }
}
