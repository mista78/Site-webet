<?php 

    class MembresController extends Controller {

        /**
         * @Route('membres', membres/index)
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
         * @Route(login, membres/login)
         */
        public function login() {
            if($this->request->data) {
                Debug($this->request->data);
            }
        }
        
        /**
         * @Route(register, membres/register)
         */
        public function register($id = null) {
            
            if($this->request->data) {
                $this->Users->name = $this->request->data->name;
                $this->Users->email = $this->request->data->email;
                $this->Users->password = password_hash($this->request->data->password, PASSWORD_DEFAULT);
                $this->Users->img = Upload();
                $this->Users->created = time();
                $this->Users->updated = time();
                $this->Users->save();
                $this->redirect("");
            }
            
        }

    }