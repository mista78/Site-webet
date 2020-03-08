<?php
    function DataTocomponent($data,$conf){
        $tab = [];

        foreach($data as $v){
            $conf['label'] = $v->name;    
            array_push($tab, $conf);
        }   

        return $tab;
    }