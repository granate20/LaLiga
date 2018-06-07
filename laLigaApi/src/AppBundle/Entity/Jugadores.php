<?php

namespace AppBundle\Entity;

/**
 * Jugadores
 */
class Jugadores
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellido;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Equipos
     */
    private $equipos;


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Jugadores
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Jugadores
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
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

    /**
     * Set equipos
     *
     * @param \AppBundle\Entity\Equipos $equipos
     *
     * @return Jugadores
     */
    public function setEquipos(\AppBundle\Entity\Equipos $equipos = null)
    {
        $this->equipos = $equipos;

        return $this;
    }

    /**
     * Get equipos
     *
     * @return \AppBundle\Entity\Equipos
     */
    public function getEquipos()
    {
        return $this->equipos;
    }
}

