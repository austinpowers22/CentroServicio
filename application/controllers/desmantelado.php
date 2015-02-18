<?php
class Desmantelado extends MX_Controller {
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
     $this->load->model('DesmanteladosModel');
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {

		if($this->session->userdata('is_logged_in')){
			$data['main_content'] = 'mantenimientos/desmantelado';
			$data['usuario'] = $this->session->userdata('usuario');
			$data['rol'] = $this->session->userdata('rol');
			$data['imagen'] = $this->session->userdata('imagen');
			$this->load->view('includes/template', $data);  
        }else{
        	$this->load->view('login');	
        }


    }
	
			public function generar_desmantelado()
    {
		if ($this->input->is_ajax_request()) {

    
		$data = $this->DesmanteladosModel->generar_desmantelado();

		echo 'Desmantelado generado con éxito';	 
	
		}else {
		redirect('404');
		}
    }


}