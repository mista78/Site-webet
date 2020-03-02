<?php
    class SetpronoController extends Controller{
        /**
         * @Route(posts, cockpit/setprono/index)
         */
        public function admin_index($id = null) {
            
            if($this->request->data) {

                $this->Sport->name = $this->request->data->name;
                $this->Sport->img = Upload(['name' => Slug($this->request->data->name)]);
                $this->Sport->created = date('Y-m-d');
                $this->Sport->updated = date('Y-m-d');
                $this->Sport->save();
                $this->redirect("posts");
            }
            
        }
    }