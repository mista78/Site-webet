<?php 

    class BlogController extends Controller {

        /**
         * @Prefix(cockpit, admin)
         * @Route(test, blog/index)
         */
        public function index() {
            $equipe = Readrss("https://www6.lequipe.fr/rss/actu_rss.xml");
            // $test = Readrss("https://www.sports.fr/feed");
            $rmc = Readrss("https://rmcsport.bfmtv.com/rss/info/flux-rss/flux-toutes-les-actualites/");
            $data = $this->Blog->find(["order" => "id DESC"]);

            $sport = $this->Sport->find();
  
            $this->set("sport",$sport);
            $this->set("rmc",$rmc);
            $this->set("equipe",$equipe);
        }

        /**
         * @Prefix(cockpit, admin)
         * @Route(ajax, blog/ajax)
         */
        public function ajax() {
            header('content-type:application/json');
            echo json_encode(["test" => "lorem"]);
            die();
        }

        /**
         * @Route(blog-show-:id, blog/show/id:([0-9]+))
         */
        public function show($id = null) {
            $this->Blog->content = "lorem";
            $data = $this->Blog->find(["conditions" => ["id" => $id]]);
            $this->set("post", $data);
        }

        /**
         * @Prefix(test, admin)
         * @Route(blog_edit, test/blog/index/id:([0-9]+))
         */
        public function admin_index($id = null) {

        }
    }