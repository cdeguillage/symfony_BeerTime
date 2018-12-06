<?php

namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\TEvent;
use App\Entity\TUser;
use App\Entity\TAddress;

class EventService {

    // private $events = [
    //     [
    //         "id" => 1,
    //         "title" => "Evénement 1",
    //         "description" => "nknlnlnl",
    //         "start_date" => "2018-12-01 08:00:00",
    //         "end_date" => "2018-12-01 22:00:00"
    //     ],
    //     [
    //         "id" => 2,
    //         "title" => "Evénement 2",
    //         "description" => "nknlncscdscsdcdslnl",
    //         "start_date" => "2018-12-01 08:00:00",
    //         "end_date" => "2018-12-31 22:00:00"
    //     ],
    //     [
    //         "id" => 3,
    //         "title" => "Evénement 3",
    //         "description" => "nknlncsdcdscsdcdslnl",
    //         "start_date" => "2017-12-01 08:00:00",
    //         "end_date" => "2017-12-01 22:00:00"
    //     ],
    //     [
    //         "id" => 4,
    //         "title" => "Evénement 4",
    //         "description" => "nknlnxcccccccccccclnl",
    //         "start_date" => "2018-11-01 08:00:00",
    //         "end_date" => "2018-12-01 22:00:00"
    //     ],
    //     [
    //         "id" => 5,
    //         "title" => "Evénement 5",
    //         "description" => "nknln___gfvfdlnl",
    //         "start_date" => "2015-12-01 08:00:00",
    //         "end_date" => "2020-12-01 22:00:00"
    //     ],
    // ];

    // Object Manager global
    private $om;

    public function __construct( ObjectManager $om ) {
        $this->om = $om;
    }

    public function getAll() {
        $repo = $this->om->getRepository( TEvent::class );
        return $repo->findAll();
        // return $this->events;
    }

    public function getOne( $id ) {
        $repo = $this->om->getRepository( TEvent::class );
        return $repo->find( $id );
        // foreach ($this->events as $key => $value) {
        //     if ( $value['id'] == $id) {
        //         return $value;
        //     }
        // }
        // return null;
    }

    public function search( string $name, string $sort, int $page ) {
        $repo = $this->om->getRepository( TEvent::class );
        return $repo->search( $name, $sort, $page );
    }

    public function counter() {
        $repo = $this->om->getRepository( TEvent::class );
        return $repo->counter();
    }

    public function countPageForPagination() {
        $repo = $this->om->getRepository( TEvent::class );
        return $repo->countPageForPagination();
    }

    public function add( $event ) {
        $repo = $this->om->getRepository( TUser::class );

        $iduser = $this->om->find( TUser::class, 1 );
        $event->setTUser( $iduser );

        $idaddress = $this->om->find( TAddress::class, 1 );
        $event->setTAddress( $idaddress );

        $this->setupMedia( $event );

        $this->om->persist( $event );
        $this->om->flush();
    }

    private function setupMedia( $event ) {

        // Si URL
        if ( !empty( $event->getPosterurl() ) )
        {
            return $event->setPoster( $event->getPosterurl() );
        }

        // Si UPLOAD
        $file = $event->getPosterfile();
        // Génére un nom de fichier aléatoire pour éviter les conflits de nom
        // A ne pas utiliser dans un contexte de sécurité
        $filename = md5( uniqid() ) . '.' . $file->guessExtension();
        // On déplace le fichier dans /public/files
        $file->move( './files', $filename );

        return $event->setPoster( $filename );
    }


}