<?php 

    function Debug ($state) 
    {
        $debug = debug_backtrace(); 
        echo "<pre> <code>";
		foreach($debug as $k=>$v){
			echo '<div><strong>'.$v['file'].' </strong> l.'.$v['line'].'</div>'; 
		}
        print_r($state);
        echo "</code> </pre>";
    }
    
    