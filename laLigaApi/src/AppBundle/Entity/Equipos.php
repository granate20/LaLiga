<?php

namespace AppBundle\Entity;

/**
 * Equipos
 */
class Equipos
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $id;

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Equipos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

}

