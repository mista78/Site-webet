<?php
    function DataTocomponent($data,$conf){
        $tab = [];
        
        foreach($data as $v){
            $conf['options']['value'] = $v->name;
            array_push($tab, $conf);
        }   
        return $tab;
    }