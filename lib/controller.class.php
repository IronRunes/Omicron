<?php
    /** Main Controller Class **/
	
    class Controller {
        
        protected $_controller;
        protected $_model;
        protected $_action;
        protected $_template;
        
		/** Get all needed pieces and load up the Template **/
        function __construct($model, $controller, $action) {
            $this->_controller = $controller;
            $this->_action = $action;
            $this->_model = $model;
            
            $this->$model = new $model;
            $this->_template = new Template($controller,$action);
        }
        
        function index(){}
        
		/** Set variables to the template **/
        function set($name,$value) {
            $this->_template->set($name,$value);
        }
        
		
		/** Display the Template **/
        function __destruct() {
			$this->_template->render();
        }
	}