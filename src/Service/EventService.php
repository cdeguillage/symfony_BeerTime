<?php

namespace App\Service;

class EventService {

    private $events = [
        [
            "id" => 1,
            "title" => "Evénement 1",
            "description" => "nknlnlnl",
            "start_date" => "2018-12-01 08:00:00",
            "end_date" => "2018-12-01 22:00:00"
        ],
        [
            "id" => 2,
            "title" => "Evénement 2",
            "description" => "nknlncscdscsdcdslnl",
            "start_date" => "2018-12-01 08:00:00",
            "end_date" => "2018-12-31 22:00:00"
        ],
        [
            "id" => 3,
            "title" => "Evénement 3",
            "description" => "nknlncsdcdscsdcdslnl",
            "start_date" => "2017-12-01 08:00:00",
            "end_date" => "2017-12-01 22:00:00"
        ],
        [
            "id" => 4,
            "title" => "Evénement 4",
            "description" => "nknlnxcccccccccccclnl",
            "start_date" => "2018-11-01 08:00:00",
            "end_date" => "2018-12-01 22:00:00"
        ],
        [
            "id" => 5,
            "title" => "Evénement 5",
            "description" => "nknln___gfvfdlnl",
            "start_date" => "2015-12-01 08:00:00",
            "end_date" => "2020-12-01 22:00:00"
        ],
    ];

    public function getAll() {
        return $this->events;
    }

    public function getOne( $id ) {

        foreach ($this->events as $key => $value) {
            if ( $value['id'] == $id) {
                return $value;
            }
        }
        return null;
    }

}