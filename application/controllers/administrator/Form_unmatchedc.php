<?php
defined('BASEPATH') OR exit('No direct script access allowed');




/**
*| --------------------------------------------------------------------------
*| Form Unmatchedc Controller
*| --------------------------------------------------------------------------
*| Form Unmatchedc site
*|
*/
class Form_unmatchedc extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_unmatchedc');
	}

	/**
	* show all Form Unmatchedcs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		// $this->is_allowed('form_unmatchedc_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_unmatchedcs'] = $this->model_form_unmatchedc->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_unmatchedc_counts'] = $this->model_form_unmatchedc->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_unmatchedc/index/',
			'total_rows'   => $this->model_form_unmatchedc->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('UnmatchEDC List');
		$this->render('backend/standart/administrator/form_builder/form_unmatchedc/form_unmatchedc_list', $this->data);
	}

	/**
	* Update view Form Unmatchedcs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_unmatchedc_update');

		$this->data['form_unmatchedc'] = $this->model_form_unmatchedc->find($id);

		$this->template->title('UnmatchEDC Update');
		$this->render('backend/standart/administrator/form_builder/form_unmatchedc/form_unmatchedc_update', $this->data);
	}

	/**
	* Update Form Unmatchedcs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_unmatchedc_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('form_unmatchedc_file_name', 'File', 'trim|required');
		
		if ($this->form_validation->run()) {
			$form_unmatchedc_file_uuid = $this->input->post('form_unmatchedc_file_uuid');
			$form_unmatchedc_file_name = $this->input->post('form_unmatchedc_file_name');
		
			$save_data = [
				'timestamp' => date('Y-m-d H:i:s'),
			];

			if (!is_dir(FCPATH . '/uploads/form_unmatchedc/')) {
				mkdir(FCPATH . '/uploads/form_unmatchedc/');
			}

			if (!empty($form_unmatchedc_file_uuid)) {
				$form_unmatchedc_file_name_copy = date('YmdHis') . '-' . $form_unmatchedc_file_name;

				rename(FCPATH . 'uploads/tmp/' . $form_unmatchedc_file_uuid . '/' . $form_unmatchedc_file_name, 
						FCPATH . 'uploads/form_unmatchedc/' . $form_unmatchedc_file_name_copy);

				if (!is_file(FCPATH . '/uploads/form_unmatchedc/' . $form_unmatchedc_file_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['file'] = $form_unmatchedc_file_name_copy;
			}
		
			
			$save_form_unmatchedc = $this->model_form_unmatchedc->change($id, $save_data);

			if ($save_form_unmatchedc) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_unmatchedc', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_unmatchedc');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					set_message('Your data not change.', 'error');
					
            		$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_unmatchedc');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	/**
	* delete Form Unmatchedcs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		// $this->is_allowed('form_unmatchedc_delete');

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
            set_message(cclang('has_been_deleted', 'Form Unmatchedc'), 'success');
        } else {
            set_message(cclang('error_delete', 'Form Unmatchedc'), 'error');
        }

		// redirect_back();
		//dev 08072019
		redirect('/administrator/upload_edc_unmatch', 'refresh');
		
	}

	/**
	* View view Form Unmatchedcs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_unmatchedc_view');

		$this->data['form_unmatchedc'] = $this->model_form_unmatchedc->find($id);

		$this->template->title('UnmatchEDC Detail');
		$this->render('backend/standart/administrator/form_builder/form_unmatchedc/form_unmatchedc_view', $this->data);
	}

	/**
	* delete Form Unmatchedcs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_unmatchedc = $this->model_form_unmatchedc->find($id);

$path = FCPATH . '/uploads/form_unmatchedc/' . $form_unmatchedc->file;

						

		$this->db->query("truncate upload_edc_unmatch;");
		$this->db->query("LOAD DATA LOCAL INFILE '$path' INTO TABLE upload_edc_unmatch FIELDS TERMINATED BY '|' IGNORE 1 ROWS;");
		// $this->db->query("
		// UPDATE edc_unmatch un JOIN upload_edc_unmatch up ON un.MID=up.MID
		// SET 
		// un.MERCHANT_DBA_NAME =  up.MERCHANT_DBA_NAME,
		// un.MSO =  up.MSO,
		// un.SOURCE_CODE =  up.SOURCE_CODE,
		// un.WILAYAH =  up.WILAYAH,
		// un.CHANNEL =  up.CHANNEL,
		// un.IS_MATCH = 1,
		// un.update_at =  NOW()
		
		// WHERE un.TAHUN=up.TAHUN AND un.BULAN=up.BULAN;		
		
		// ");

// return 1;

		if (!empty($form_unmatchedc->file)) {
			// $path = FCPATH . '/uploads/form_unmatchedc/' . $form_unmatchedc->file;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}

		
		return $this->model_form_unmatchedc->remove($id);
	}
	
	/**
	* Upload Image Form Unmatchedc	* 
	* @return JSON
	*/
	public function upload_file_file()
	{
		if (!$this->is_allowed('form_unmatchedc_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'form_unmatchedc',
		]);
	}

	/**
	* Delete Image Form Unmatchedc	* 
	* @return JSON
	*/
	public function delete_file_file($uuid)
	{
		if (!$this->is_allowed('form_unmatchedc_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'file', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'form_unmatchedc',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/form_unmatchedc/'
        ]);
	}

	/**
	* Get Image Form Unmatchedc	* 
	* @return JSON
	*/
	public function get_file_file($id)
	{
		if (!$this->is_allowed('form_unmatchedc_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$form_unmatchedc = $this->model_form_unmatchedc->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'file', 
            'table_name'        => 'form_unmatchedc',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/form_unmatchedc/',
            'delete_endpoint'   => 'administrator/form_unmatchedc/delete_file_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_unmatchedc_export');

		$this->model_form_unmatchedc->export('form_unmatchedc', 'form_unmatchedc');
	}
}


/* End of file form_unmatchedc.php */
/* Location: ./application/controllers/administrator/Form Unmatchedc.php */