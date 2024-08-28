<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');  
      
    class Hello extends BaseController {  
          
        public function index(): string  
        {  
            $this->load->view('hello_world');  
        }  
    }  
    ?>  