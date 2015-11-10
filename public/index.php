<?php
    /** Start Sessions **/
    session_start();
    
    /** Get URL params and store **/
    $url =  ( isset($_GET['url']) ? $_GET['url'] : null );
    
    /** Require Main Config File **/
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
    
    /** Require Other Program files (local definitions and functions) **/
    require_once(ROOT . DS . 'config' . DS . 'definitions.php');
    require_once(ROOT . DS . 'lib' . DS . 'functions.php');
    
    /** Require Main Program **/
    require_once(ROOT . DS . 'lib' . DS . 'main.php');