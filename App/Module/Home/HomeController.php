<?php 

    class HomeController extends Controller {

        /**
         * @Route('', home/index)
         */
        public function index() {
            // $test = Readrss("http://feeds.feedburner.com/SoFoot");
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
         * @Route(post, cockpit/home/index)
         */
        public function admin_index($id = null) {
            
            if($this->request->data) {
                $this->Blog->name = $this->request->data->name;
                $this->Blog->slug = $this->request->data->slug;
                $this->Blog->content = $this->request->data->content;
                $this->Blog->img = Upload();
                $this->Blog->created = time();
                $this->Blog->updated = time();
                $this->Blog->save();
                $this->redirect("");
            }
            
        }

    }