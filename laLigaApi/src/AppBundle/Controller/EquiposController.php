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
    public function getAllAction()
    {
        $em = $this->getDoctrine()->getManager();

        return $em->getRepository('AppBundle:Equipos')->findBy([],["nombre"=>"asc"]);
    }
}
