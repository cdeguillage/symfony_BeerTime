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
        $repo = $this->om->getRepository( TUser::class );

        $this->om->persist( $user );
        $this->om->flush();
    }
    
    public function getAll() {
        $repo = $this->om->getRepository( TUser::class );
        return $repo->findAll();
    }

    public function getOne( $id ) {
        $repo = $this->om->getRepository( TUser::class );
        return $repo->find( $id );
    }

    public function isConnected( $user ) {
        $repo = $this->om->getRepository( TUser::class )
                         ->findBy( array( 'username' => $user->getUsername(),
                                          'password' => $user->getPassword()
                                        ) );
        return (!empty( $repo ));
    }

}