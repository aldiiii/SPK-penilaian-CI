<?php

/**
 * Directory PHP Libraries Function.
 *
 * Updated  2016, 18 Mei 08:55
 *
 * @author  Yudi Setiadi Permana <mail@yspermana.my.id>
 *
 */

class Directory{

    public function __construct(){
        
    }

    public function createDirectory($path,$include_filename=false){
  
        $dir = explode('/',$path);  // Array direktori
        $total = (int) count($dir);  // Total array
      
        if($include_filename == true){
            unset($dir[($total - 1)]);  // Unset array terakhir (filename)
        }
        
        $cur_dir = '';
           
        foreach($dir as $key){   // Membuat direktori
            if(!is_dir($cur_dir.$key)){
                
                $old_umask = umask(0);

                mkdir($cur_dir.$key, 0777);
                umask($old_umask);
            }
            $cur_dir .= $key.'/';
        }
    }

    public function deleteDirectory($dirPath){

        if(!is_dir($dirPath)){
            throw new InvalidArgumentException("$dirPath must be a directory");
        }

        if(substr($dirPath, strlen($dirPath) - 1, 1) != '/'){
            $dirPath .= '/';
        }

        $files = glob($dirPath . '*', GLOB_MARK);

        foreach ($files as $file) {
            if(is_dir($file)){
                // self::deleteDirectory($file);
                $this->deleteDirectory($file);
                // rmdir($file);
            }
            else{
                unlink($file);
            }
        }

        rmdir($dirPath);
    }

}

?>