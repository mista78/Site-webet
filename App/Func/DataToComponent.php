<?php
    function DataTocomponent($data,$conf){
        $tab = [];
        
        foreach($data as $v){
            $conf['options']['value'] = $v->name;
            array_push($tab, $conf);
        }   
        return $tab;
    }

    function DataToOption($data){
        $tab = [];
        foreach($data as $v){
            $tab[$v->id] = $v->name;
        }   
        return $tab;
    }