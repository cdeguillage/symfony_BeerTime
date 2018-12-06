<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\TUser;

use App\Service\AdmService;

use App\Form\FConnectType;
use App\Form\FInscribeType;

class AdmController extends AbstractController
{
    /**
     * @Route("/adm/connect", name="connect")
     */
    public function connect(Request $request, AdmService $admService )
    {
        $user = new TUser();

        $form = $this->createForm( FConnectType::class, $user );

        // Contrôle les @Assert dans l'entité
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $user = $form->getData();

            // Service
            if ( $admService->isConnected( $user ) ) {
                return $this->redirectToRoute('list');
            } else {
                return $this->redirectToRoute('connect');
            };
        }

        return $this->render('adm/connect.html.twig', [
            'title' => 'Se connecter',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/adm/inscribe", name="inscribe")
     */
    public function inscribe(Request $request, AdmService $admService )
    {
        $user = new TUser();

        $form = $this->createForm( FInscribeType::class, $user );

        // Contrôle les @Assert dans l'entité
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $user = $form->getData();

            // Service
            $admService->add( $user );

            return $this->redirectToRoute('account', [ 'id' => $user->getIduser() ]);
        }

        return $this->render('adm/inscribe.html.twig', [
            'title' => 'S\'inscrire',
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/adm/account/{id}", name="account")
     */
    public function account(Request $request, AdmService $admService, string $id )
    {
        return $this->render('adm/account.html.twig', [
            'title' => 'Votre compte',
            'id' => $id,
            'user' => $admService->getOne( $id ),
        ]);
    }

}
