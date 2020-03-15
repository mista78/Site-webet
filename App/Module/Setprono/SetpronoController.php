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
        /**
         * @Route(coupon, cockpit/setprono/giveprono)
         */
        public function admin_giveprono($id = null) {
            $enitySport = new Sport();
            $sport = $enitySport->find();
            if($this->request->data) {
                $this->Pronostics->cote = $this->request->data->cote;
                $this->Pronostics->name = $this->request->data->name;
                $this->Pronostics->idSport = $this->request->data->idSport;
                $this->Pronostics->dateValid = date('Y-m-d');
                $this->Pronostics->save();
            }
            $this->set("sport",$sport);
        }
    }