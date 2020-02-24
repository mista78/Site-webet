<?php 

    /**
     * scss_formatter_compressed
     * scss_formatter_nested
     * scss_formatter
     */
    function CompileCss($dirSass, $dirCss = "assets/css/",$formated = "scss_formatter_compressed") {
        $compile = loadFiletime(ROOT .  "Public/" . $dirSass . '*') ?? [];
        $file = glob(ROOT . "Public/" . $dirCss . '*');
        if (count($compile) > 0) {
            return SassCompiler::run(ROOT .  "Public/" . $dirSass , ROOT .  "Public/" . $dirCss,$formated);
        } else {
            return str_replace(ROOT . "Public/" , "", current($file));
        }
    }
    
    function minimizeJavascriptSimple($javascript){
        return preg_replace(array("/\s+\n/","/\n\s+/","/ +/"),array("\n","\n "," "),$javascript);
    }

    /**
     * Compilation du js 
     * @return file js
     */
    function loadJs() {
        $path1  = ROOT . "Public" . DS ;
        $path2  = APP . "Component" . DS ;
        $js     = "";
        $jsfile = glob($path1 . "assets/sass/js/*");
        $jsfile = array_merge($jsfile, glob(APP . "Component" . DS .  "*/*.js" ));
        array_map('unlink', glob($path1 .  "assets/js/*"));
        foreach ($jsfile as $key => $value) {
            $file_path_elements = pathinfo($value);
            $file_dir = $file_path_elements["dirname"];
            $file_name = $file_path_elements['filename'];
            $string_sass = file_get_contents($file_dir . DS . $file_name . ".js");
            $js .= minimizeJavascriptSimple($string_sass);
        }
        $dir = $path1 .  "assets/js/" . "app" . time() . ".js";
        file_put_contents($dir, $js);
        return str_replace($path1, "", $dir);
    }
    
    function CompileJs() {
        $compile = loadFiletime(ROOT .  "Public/assets/sass/js/"  . '*',".js") ?? [];
        
        $file = glob(ROOT . "Public/assets/js/" . '*');
        if (count($compile) > 0) {
            return loadJs();
        } else {
            return str_replace(ROOT . "Public/" , "", current($file));
        }
    }

    /**
     * Get last update file;
     * @param  string  dirname 
     * @param  string  extends file 
     * @return array   nb file updated
     */
    function loadFiletime($dir,$extends = ".scss") {
		global $compile;
        $test = glob($dir);
        $test = array_merge($test, glob(APP . "Component" . DS .  "*/*". $extends ));
		foreach ($test as $key => $value) {
			if (is_file($value)) {
				$time = filemtime($value);
				if ($time >= time() - 60 * .5  ) {
					$compile[] = $value;
				}
			} else {
				loadFiletime($value . DS . '*');
			}
		}
		return $compile;
	}
