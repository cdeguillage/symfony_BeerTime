<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use App\Entity\TEvent;
use App\Entity\TUser;
use App\Entity\TAddress;

use App\Service\EventService;

use App\Form\FCreateEventType;

class EventController extends AbstractController
{
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
            
            // Save the datas
            // $om = $this->getDoctrine()->getManager();

            $event = $form->getData();

            // $iduser = $om->find( TUser::class, $queryIdUserCreate );
            // $event->setTUser( $iduser );

            // $idaddress = $om->find( TAddress::class, $queryIdAddress );
            // $event->setTAddress( $idaddress );

            // $om->persist( $event );
            // $om->flush();

            // Service
            $eventService->add( $event );

            return $this->redirectToRoute('show', [ 'id' => $event->getIdevent() ]);
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
     * @IsGranted("ROLE_USER")
     * @Route("/event/{id}/join", name="join", requirements={"id"="\d+"})
     */
    public function join( EventService $eventService, string $id )
    {
        return $this->render('event/join.html.twig', [
            'title' => 'Rejoindre un événement',
            'eventid' => $id,
            'event' => $eventService->getOne( $id ),
        ]);
    }

}
