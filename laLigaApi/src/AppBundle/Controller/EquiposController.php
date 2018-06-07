<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Equipos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Equipo controller.
 *
 */
class EquiposController extends Controller
{
    /**
     * Lists all equipo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipos = $em->getRepository('AppBundle:Equipos')->findAll();

        return $this->render('equipos/index.html.twig', array(
            'equipos' => $equipos,
        ));
    }

    /**
     * Finds and displays a equipo entity.
     *
     */
    public function showAction(Equipos $equipo)
    {

        return $this->render('equipos/show.html.twig', array(
            'equipo' => $equipo,
        ));
    }
}
