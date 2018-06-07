<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JugadoresControllerTest extends WebTestCase
{
    
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();
        $client->request('GET', '/getAllTeams');

        $respuestaEquipos=json_decode($client->getResponse()->getContent());

        //obtengo los jugadores del primer equipo
        $client->request('GET', '/getPlayersByClub/'.$respuestaEquipos[0]->id);

        $respuestaJugadores=json_decode($client->getResponse()->getContent());

        $this->assertTrue(count($respuestaJugadores)>0,"Error al obtener jugadores");
        foreach($respuestaJugadores as $jugador)
        {
            $this->assertEquals($jugador->equipos->id,$respuestaEquipos[0]->id,"Error al verificar jugadores");
        }

    }

    public function testCreatePlayer()
    {
        // Create a new client to browse the application
        $client = static::createClient();
        $client->request('GET', '/getAllTeams');

        $respuestaEquipos=json_decode($client->getResponse()->getContent());

        foreach($respuestaEquipos as $equipo)
        {
            $data = array(
                'nombre' => "Nuevo",
                'apellido' => "New",
            );
            $client->request('POST',"/newPlayerToTeam/".$equipo->id, $data);
            //$request = $client->post('/newPlayerToTeam/'.$equipo->id, null, json_encode($data));
            $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for new player");

        }

    }
}
