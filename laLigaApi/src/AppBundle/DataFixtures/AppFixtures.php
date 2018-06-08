<?php
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Equipos;
use AppBundle\Entity\Jugadores;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 5; $i++) {
            $equipo = new Equipos();
            $equipo->setNombre('Equipo '.$i);
            $manager->persist($equipo);
            for ($x = 0; $x < 23; $x++) {
                $jugador = new Jugadores();
                $jugador->setNombre("Nombre ".$x);
                $jugador->setApellido("Apellido ".$x);
                $jugador->setEquipos($equipo);
                $manager->persist($jugador);
            }
        }

        $manager->flush();
    }
}