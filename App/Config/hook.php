<?php 

    if($this->request->prefix) {
        $this->layout = trim($this->request->prefix);
    }