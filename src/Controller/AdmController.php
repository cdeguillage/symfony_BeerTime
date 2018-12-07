<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Authentication\UserPasswordEncoderInterface;

use App\Entity\TUser;

use App\Service\AdmService;

use App\Form\FLoginType;
use App\Form\FRegisterType;

class AdmController extends AbstractController
{
    /**
     * @Route("/adm/login", name="login")
     */
    public function login(Request $request, AdmService $admService, AuthenticationUtils $authenticationUtils )
    {
        $user = new TUser();

        $form = $this->createForm( FLoginType::class, $user );

        // Contrôle les @Assert dans l'entité
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $user = $form->getData();

            // Service
            if ( $admService->isConnected( $user ) ) {
                $user->setConnected('1');
                return $this->redirectToRoute('list');
            } else {
                return $this->redirectToRoute('connect');
            };
        }

        return $this->render('adm/login.html.twig', [
            'title' => 'Se connecter',
            'lastUsername' => $authenticationUtils->getLastUsername(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/adm/register", name="register")
     */
    public function register(Request $request, AdmService $admService /*, UserPasswordEncoderInterface $encoder*/ )
    {
        $user = new TUser();

        $form = $this->createForm( FRegisterType::class, $user );

        // Contrôle les @Assert dans l'entité
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();
            $user->setRoles( ['ROLE_USER'] );
            // $encoded = $encoder->encodePassword( $user->getPlainPassword() );
            // $user->setPassword( $encoded );

            // Service
            $admService->add( $user );

            return $this->redirectToRoute('account', [ 'id' => $user->getIduser() ]);
        }

        return $this->render('adm/register.html.twig', [
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

    /**
     * @Route("/adm/logout", name="logout")
     */
    public function logout() {
        $user->setConnected('0');
    }


}
