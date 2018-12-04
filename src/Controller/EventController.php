<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\TEvent;
use App\Service\EventService;
use App\Form\FCreateEventType;

class EventController extends AbstractController
{

    // private function createView() {
    //     return 'Rien';
    // }

    /**
     * @Route("/event/create", name="create")
     */
    public function create( EventService $eventService, Request $request )
    {
        $event = new TEvent();

        $form = $this->createForm( FCreateEventType::class, $event );

        // Contrôle les @Assert dans l'entité
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $event = $form->getData();
            
            // Save the datas
            $om = $this->getDoctrine()->getManager();
            $om->persist( $event );
            $om->flush();

            return $this->redirectToRoute('task_success');
        }

        return $this->render('event/create.html.twig', [
            'title' => 'Créer un événement',
            // 'eventid' => $id,
            // 'event' => $eventService->getOne( $id ),
            'form' => $form->createView(),
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
        $queryPage = empty($request->query->get('page')) ? 1 : $request->query->get('page');

        return $this->render('event/list.html.twig', [
            'title' => 'Lister les événements',
            // 'events' => $eventService->getAll(),
            'events' => $eventService->search( $querySearch, $querySort, $queryPage ),
            'incomingEvent' => $eventService->counter(),
            'countpageforpagination' => $eventService->countPageForPagination(),
            'nopage' => $queryPage,
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
