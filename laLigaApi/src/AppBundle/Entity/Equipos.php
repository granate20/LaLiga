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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jugadores;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jugadores = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Add jugadore
     *
     * @param \AppBundle\Entity\Jugadores $jugadore
     *
     * @return Equipos
     */
    public function addJugadore(\AppBundle\Entity\Jugadores $jugadore)
    {
        $this->jugadores[] = $jugadore;

        return $this;
    }

    /**
     * Remove jugadore
     *
     * @param \AppBundle\Entity\Jugadores $jugadore
     */
    public function removeJugadore(\AppBundle\Entity\Jugadores $jugadore)
    {
        $this->jugadores->removeElement($jugadore);
    }

    /**
     * Get jugadores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJugadores()
    {
        return $this->jugadores;
    }
}

