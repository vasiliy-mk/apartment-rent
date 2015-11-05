<?php

// sets active class to menu list
function set_active($current_path,$route_path,$active_class = ' class="active"'){
    $route_path   = urldecode($route_path);
    $current_path = urldecode($current_path);

    if(is_array($route_path)){
        return (in_array($current_path,$route_path))? $active_class : '';
    }

    if(strpos($route_path,'/*')){
        $route_path = str_replace('/*','',$route_path);
        return (strpos($current_path,$route_path)!==false) ? $active_class : '';
    }
    return ($current_path == $route_path) ? $active_class : '';
}


// sets selected to option list
function set_selected($name,$value){
    if($name == $value) return 'selected';
}

function set_checked($value){
    if($value) return 'checked';
}

// adds slug to link path
function add_slug($slug){
   return ($slug) ? '/'.$slug : '';
}


function strip_signs($str){
    $arr = array(
        '=',
        ' ',
        '?',
        '!',
        '(',
        ')',
        '[',
        ']',
        '”',
        '“',
        '\'',
        '/',
        ',',
        '&',
        ':',
        ';');

    $str = str_replace($arr,"-",$str);
    return  trim(preg_replace("/-{2,}/","-",$str),'-');

}

function delete_directory($directory) {
    foreach(glob("{$directory}/*") as $file){
        if(is_dir($file)) {
            delete_directory($file);
        }else{
            unlink($file);
        }
    }
    rmdir($directory);
}