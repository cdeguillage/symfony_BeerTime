<?php

namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\TUser;

class AdmService {

    // Object Manager global
    private $om;

    public function __construct( ObjectManager $om ) {
        $this->om = $om;
    }

    // public function countPageForPagination() {
    //     $repo = $this->om->getRepository( TEvent::class );
    //     return $repo->countPageForPagination();
    // }

    // public function add( $event ) {
    //     $repo = $this->om->getRepository( TUser::class );

    //     $iduser = $this->om->find( TUser::class, 1 );
    //     $event->setTUser( $iduser );

    //     $idaddress = $this->om->find( TAddress::class, 1 );
    //     $event->setTAddress( $idaddress );

    //     $this->setupMedia( $event );

    //     $this->om->persist( $event );
    //     $this->om->flush();
    // }

    // private function setupMedia( $event ) {

    //     // Si URL
    //     if ( !empty( $event->getPosterurl() ) )
    //     {
    //         return $event->setPoster( $event->getPosterurl() );
    //     }

    //     // Si UPLOAD
    //     $file = $event->getPosterfile();
    //     // Génére un nom de fichier aléatoire pour éviter les conflits de nom
    //     // A ne pas utiliser dans un contexte de sécurité
    //     $filename = md5( uniqid() ) . '.' . $file->guessExtension();
    //     // On déplace le fichier dans /public/files
    //     $file->move( './files', $filename );

    //     return $event->setPoster( $filename );
    // }

    public function add( $user ) {
        // On crypte le mot de passe
        $user->setPassword( password_hash( $user->getPassword(), PASSWORD_BCRYPT ) );

        $repo = $this->om->getRepository( TUser::class );

        $this->om->persist( $user );
        $this->om->flush();
    }
    
    public function getAll() {
        $repo = $this->om->getRepository( TUser::class );
        return $repo->findAll();
    }

    public function getOneId( $id ) {
        $repo = $this->om->getRepository( TUser::class );
        return $repo->find( $id );
    }

    public function isUsernameExist( $username ) {
        $repo = $this->om->getRepository( TUser::class );

        return ( !empty( $repo->findBy( array( 'username' => $username ) )[0]->getUsername() ) );
    }

    public function getPassword( $username ) {
        $repo = $this->om->getRepository( TUser::class );

        return $repo->findBy( array( 'username' => $username ) )[0]->getPassword();
    }

    public function isConnected( $user ) {
        $user_password = $user->getPassword();
        $bdd_password = $this->getPassword( $user->getUsername() );

        return ( password_verify( $user_password, $bdd_password ) );
    }

}