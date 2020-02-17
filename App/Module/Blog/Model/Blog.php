<?php 

    class Blog extends Ormclass {
        
        /**
         * int
         */
        public $id;


        /**
         * varchar(255)
         */
        public $name;

        /**
         * varchar(255)
         */
        public $slug;
        
        /**
         * varchar(255)
         */
        public $description;
        
        /**
         * varchar(255)
         */
        public $img;


        /**
         * text
         */
        public $content;

        /**
         * varchar(255)
         */
        public $created;

        /**
         * varchar(255)
         */
        public $updated;

        public function getUrl() {
            return Router::url("blog/show/id:" . $this->id);
        }
    }