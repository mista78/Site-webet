<?php 

    class HomeController extends Controller {

        /**
         * @Route('', home/index)
         */
        public function index() {
            $data = $this->Blog->find(["order" => "id DESC"]);
            $this->set("posts",$data);
        
        }
        
        /**
         * @Route(posts, cockpit/home/index)
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