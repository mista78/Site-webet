<?php
    function DataTocomponent($data,$conf){
        $tab = [];
        
        foreach($data as $v){
            $conf['name'] = $v->name;
            $conf['options']['value'] = $v->name;
            array_push($tab, $conf);
        }   
        return $tab;
    }