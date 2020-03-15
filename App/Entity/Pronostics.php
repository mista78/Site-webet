<?php
    class Pronostics extends Ormclass{
        
        /**
         * int
         */
        public $id;

        /**
         * int
         */
        public $idSport;

        /**
         * float
         */
        public $cote;

        /**
         * varchar(255)
         */
        public $name;

        /**
         * date
         */
        public $dateValid;
    }