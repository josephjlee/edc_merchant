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
	* show all Form Applicationsources
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_applicationsource_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_applicationsources'] = $this->model_form_applicationsource->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_applicationsource_counts'] = $this->model_form_applicationsource->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_applicationsource/index/',
			'total_rows'   => $this->model_form_applicationsource->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('ApplicationSource List');
		$this->render('backend/standart/administrator/form_builder/form_applicationsource/form_applicationsource_list', $this->data);
	}

	/**
	* Update view Form Applicationsources
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_applicationsource_update');

		$this->data['form_applicationsource'] = $this->model_form_applicationsource->find($id);

		$this->template->title('ApplicationSource Update');
		$this->render('backend/standart/administrator/form_builder/form_applicationsource/form_applicationsource_update', $this->data);
	}

	/**
	* Update Form Applicationsources
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_applicationsource_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('applicationsource', 'ApplicationSource', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'applicationsource' => $this->input->post('applicationsource'),
			];

			
			$save_form_applicationsource = $this->model_form_applicationsource->change($id, $save_data);

			if ($save_form_applicationsource) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_applicationsource', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_applicationsource');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					set_message('Your data not change.', 'error');
					
            		$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_applicationsource');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	/**
	* delete Form Applicationsources
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_applicationsource_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'Form Applicationsource'), 'success');
        } else {
            set_message(cclang('error_delete', 'Form Applicationsource'), 'error');
        }

		redirect_back();
	}

	/**
	* View view Form Applicationsources
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_applicationsource_view');

		$this->data['form_applicationsource'] = $this->model_form_applicationsource->find($id);

		$this->template->title('ApplicationSource Detail');
		$this->render('backend/standart/administrator/form_builder/form_applicationsource/form_applicationsource_view', $this->data);
	}

	/**
	* delete Form Applicationsources
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_applicationsource = $this->model_form_applicationsource->find($id);

		
		return $this->model_form_applicationsource->remove($id);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_applicationsource_export');

		$this->model_form_applicationsource->export('form_applicationsource', 'form_applicationsource');
	}
}


/* End of file form_applicationsource.php */
/* Location: ./application/controllers/administrator/Form Applicationsource.php */