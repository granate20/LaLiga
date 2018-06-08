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
        try
        {
            $em = $this->getDoctrine()->getManager();
    
            return $em->getRepository('AppBundle:Equipos')->findBy([],["nombre"=>"asc"]);
        }
        catch(\Exception $ex)
        {
            throw $this->createNotFoundException('Error al mostrar equipos');
        }
    }
}
