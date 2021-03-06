<?php

    /** checks if user has a role
     * var object $user from Auth->getProfile() (Session->getSession())
     * returns boolean
     * */
    function hasRole($user, $role){
        
        if($user->role == 'Root'){
            return true;
        }
        else {
            if($user->role == ucwords($role)){
                return true;
            }
            else {
                return false; 
            }
        }        
    }
    
    
    
    /** Prints out Bootstrap alerts
     * finds key of response and
     * uses it to format the alert
     * as wished
     * */
    function printResponse($response){
        foreach($response as $type => $text){
            switch($type) {
                case 'success':
                    $icon = 'check';
                    break;
                case 'danger':
                    $icon = 'exclamation-triangle';
                    break;
                case 'warning':
                    $icon = 'exclamation-circle';
                    break;
                case 'info':
                    $icon = 'info';
                    break;
            }
            echo '<div class="alert alert-' . $type . '  alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-' . $icon . '"></i> ' . $text . '
                    
                </div>';
        }
    }
    
   
    /**
     * verify that an array index exists and is not empty or null.
     * can also do some type control.
     * */
    function verify($var, $strict = false, $type = 'string'){
        if(!isset($var) || empty($var) || is_null($var)){
            return false;
        }
        else {
            if($strict){
                switch($type){
                    case 'number':
                        if(is_numeric($var)){
                            return true;
                        }
                        break;
                    case 'string':
                        return true;
                        break;
                    case 'array':
                        if(is_array($var)){
                            return true;
                        }
                        break;
                    default:
                        return false;
                        break;
                }
            }
            else {
                return true;    
            }
            
        }
    }
    
     /**
     * Rearranges an array
     * used to "reflow" the $_FILES array
     * with multiple entries
     * */
    function rearrange($arr){
        foreach($arr as $key => $all){
            foreach($all as $i => $val){
                $new[$i][$key] = $val;   
            }   
        }
        return $new;
    }
    
    /** prints friendly arrays
     * used mainly for debugging
     * */
    function dbga($array){
        echo '<div class="dbg"><pre>';
        print_r($array);
        echo '</pre></div>';
    }
    
    function dsql($sql){
        echo '<div class="dbg"><pre>';
        echo $sql;
        echo '</pre></div>';
    }
    
   
    
    /**
     *DateTime printers
     **/
    function dateFormat($timestamp){
        return date('D, j M Y, H:i', $timestamp);
    }
    
    function dateFormatNoTime($timestamp){
        return date('D, j M Y', $timestamp);
    }

    function dbDate($date){
        return date('Y-m-d H:i:s', strtotime($date));
    }
    function dbDateNoTime($string){
        $d = explode('/', $string);
        return implode('-', array_reverse($d)); 
    }
    
    