<?php
    spl_autoload_register(function ($className) {
        $dirs = ['models','controllers','components'];
        foreach ($dirs as $dir){
            if (file_exists("$dir/$className.php")){
                include_once("$dir/$className.php");
                break;
            }
        }
    });
