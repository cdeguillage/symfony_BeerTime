<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
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
    public function show( EventService $eventService, string $id )
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
    public function list(Request $request,  EventService $eventService )
    {
        $querySearch = empty($request->query->get('querySearch')) ? '' : $request->query->get('querySearch');
        $querySort = empty($request->query->get('sort')) ? '' : $request->query->get('sort');
        $queryPage = empty($request->query->get('page')) ? '' : $request->query->get('page');

        return $this->render('event/list.html.twig', [
            'title' => 'Lister les événements',
            // 'events' => $eventService->getAll(),
            'events' => $eventService->search( $querySearch, $querySort, $queryPage ),
            'incomingEvent' => $eventService->counter(),
        ]);
    }

    /**
     * @Route("/event/{id}/join", name="join", requirements={"id"="\d+"})
     */
    public function join( EventService $eventService, string $id )
    {
        return $this->render('event/show.html.twig', [
            'title' => 'Rejoindre un événement',
            'eventid' => $id,
            'event' => $eventService->getOne( $id ),
        ]);
    }
}
