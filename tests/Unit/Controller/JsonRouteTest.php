<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiSimulatorControllerTest extends WebTestCase {
    public function testIndexResponse() {
        // Crée un client pour simuler une requête HTTP
        $client = static::createClient();

        // Exécute une requête GET vers l'URL du contrôleur
        $client->request('GET', '/api/simulator');

        // Vérifie que la réponse est un succès (200)
        $this->assertResponseIsSuccessful();

        // Vérifie que le content-type est bien du JSON
        $this->assertResponseHeaderSame('content-type', 'application/json');

        // Récupère le contenu de la réponse et décode le JSON
        $responseContent = $client->getResponse()->getContent();
        $data = json_decode($responseContent, true);

        // Vérifie que la réponse est bien un tableau de dinosaures
        $this->assertIsArray($data);
        $this->assertCount(5, $data); // Il doit y avoir 5 dinosaures

        // Vérifie que chaque dinosaure a les clés attendues
        foreach ($data as $dinosaur) {
            $this->assertArrayHasKey('name', $dinosaur);
            $this->assertArrayHasKey('genus', $dinosaur);
            $this->assertArrayHasKey('length', $dinosaur);
        }

        // Vérifie les valeurs de quelques dinosaures (par exemple le premier)
        $this->assertSame('Daisy', $data[0]['name']);
        $this->assertSame('Velociraptor', $data[0]['genus']);
        $this->assertSame(2, $data[0]['length']);
    }
}