<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class EventController extends AbstractController
{

    /**
     * @Route("/event/create", name="create")
     */
    public function create()
    {
        return new Response("Créer un événement");
    }

    /**
     * @Route("/event/show/{id}", name="show", requirements={"id"="\d+"})
     */
    public function show( $id )
    {
        return new Response("Afficher un événement");
    }

    /**
     * @Route("/event/list", name="list")
     */
    public function list()
    {
        return new Response("Lister les événements");
    }

    /**
     * @Route("/event/{id}/join", name="join")
     */
    public function join( $id )
    {
        return new Response("Rejoindre un événement");
    }
}
