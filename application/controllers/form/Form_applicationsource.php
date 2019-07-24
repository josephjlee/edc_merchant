<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Applicationsource Controller
*| --------------------------------------------------------------------------
*| Form Applicationsource site
*|
*/
class Form_applicationsource extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_applicationsource');
	}

	/**
	* Submit Form Applicationsources
	*
	*/
	public function submit()
	{
		$this->form_validation->set_rules('applicationsource', 'ApplicationSource', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'applicationsource' => $this->input->post('applicationsource'),
			];

			
			$save_form_applicationsource = $this->model_form_applicationsource->store($save_data);

			$this->data['success'] = true;
			$this->data['id'] 	   = $save_form_applicationsource;
			$this->data['message'] = cclang('your_data_has_been_successfully_submitted');
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	
}


/* End of file form_applicationsource.php */
/* Location: ./application/controllers/administrator/Form Applicationsource.php */