<?php
    function DataTocomponent($data,$option = []){
        $tab = [];
        foreach($data as $v){
            array_push($tab, [
                "type" => "input", 
                "name" => "sport", 
                'label' => $v['name'],
                'options' => ['type' => 'radio']
                ]);
        }
        return $tab;
    }