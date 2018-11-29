<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use App\Service\EventService;


class EventController extends AbstractController
{

    /**
     * @Route("/event/create", name="create")
     */
    public function create( EventService $eventService )
    {
        $id = 5;

        return $this->render('event/create.html.twig', [
            'title' => 'Créer un événement',
            'eventid' => $id,
            'event' => $eventService->getOne( $id ),
        ]);
    }

    /**
     * @Route("/event/show/{id}", name="show", requirements={"id"="\d+"})
     */
    public function show( EventService $eventService, $id )
    {
        return $this->render('event/show.html.twig', [
            'title' => 'Afficher un événement',
            'eventid' => $id,
            'event' => $eventService->getOne( $id ),
        ]);
    }

    /**
     * @Route("/event/list", name="list")
     */
    public function list( EventService $eventService )
    {
        return $this->render('event/list.html.twig', [
            'title' => 'Lister les événements',
            'events' => $eventService->getAll(),
        ]);
    }

    /**
     * @Route("/event/{id}/join", name="join", requirements={"id"="\d+"})
     */
    public function join( EventService $eventService, $id )
    {
        return $this->render('event/show.html.twig', [
            'title' => 'Rejoindre un événement',
            'eventid' => $id,
            'event' => $eventService->getOne( $id ),
        ]);
    }
}
