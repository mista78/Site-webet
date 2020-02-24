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
         * varchar(255)
         */
        public $prono;

        /**
         * date
         */
        public $dateValid;
    }