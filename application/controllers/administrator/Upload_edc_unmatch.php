<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Upload Edc Unmatch Controller
*| --------------------------------------------------------------------------
*| Upload Edc Unmatch site
*|
*/
class Upload_edc_unmatch extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_upload_edc_unmatch');
	}

	/**
	* show all Upload Edc Unmatchs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		// $this->is_allowed('upload_edc_unmatch_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['upload_edc_unmatchs'] = $this->model_upload_edc_unmatch->get($filter, $field, $this->limit_page, $offset);
		$this->data['upload_edc_unmatch_counts'] = $this->model_upload_edc_unmatch->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/upload_edc_unmatch/index/',
			'total_rows'   => $this->model_upload_edc_unmatch->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Upload Edc Unmatch List');
		$this->render('backend/standart/administrator/upload_edc_unmatch/upload_edc_unmatch_list', $this->data);
	}
	

	public function generate(){

		$this->db->query("
		UPDATE edc_unmatch un JOIN upload_edc_unmatch up ON un.MID=up.MID
		SET 
		un.MERCHANT_DBA_NAME =  up.MERCHANT_DBA_NAME,
		un.MSO =  up.MSO,
		un.SOURCE_CODE =  up.SOURCE_CODE,
		un.WILAYAH =  up.WILAYAH,
		un.CHANNEL =  up.CHANNEL,
		un.IS_MATCH = 1,
		un.update_at =  NOW()
		
		WHERE un.TAHUN=up.TAHUN AND un.BULAN=up.BULAN;		
		
		");

		// redirect('/administrator/upload_edc_unmatch', 'refresh');
		redirect('/administrator/form_unmatchedc', 'refresh');
		
	}
	/**
	* Add new upload_edc_unmatchs
	*
	*/
	public function add()
	{
		$this->is_allowed('upload_edc_unmatch_add');

		$this->template->title('Upload Edc Unmatch New');
		$this->render('backend/standart/administrator/upload_edc_unmatch/upload_edc_unmatch_add', $this->data);
	}

	/**
	* Add New Upload Edc Unmatchs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('upload_edc_unmatch_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('MERCHANT_DBA_NAME', 'MERCHANT DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[25]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('TAHUN', 'TAHUN', 'trim|required|max_length[4]');
		$this->form_validation->set_rules('BULAN', 'BULAN', 'trim|required|max_length[5]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'MERCHANT_DBA_NAME' => $this->input->post('MERCHANT_DBA_NAME'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TAHUN' => $this->input->post('TAHUN'),
				'BULAN' => $this->input->post('BULAN'),
			];

			
			$save_upload_edc_unmatch = $this->model_upload_edc_unmatch->store($save_data);

			if ($save_upload_edc_unmatch) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_upload_edc_unmatch;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/upload_edc_unmatch/edit/' . $save_upload_edc_unmatch, 'Edit Upload Edc Unmatch'),
						anchor('administrator/upload_edc_unmatch', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/upload_edc_unmatch/edit/' . $save_upload_edc_unmatch, 'Edit Upload Edc Unmatch')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/upload_edc_unmatch');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/upload_edc_unmatch');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Upload Edc Unmatchs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('upload_edc_unmatch_update');

		$this->data['upload_edc_unmatch'] = $this->model_upload_edc_unmatch->find($id);

		$this->template->title('Upload Edc Unmatch Update');
		$this->render('backend/standart/administrator/upload_edc_unmatch/upload_edc_unmatch_update', $this->data);
	}

	/**
	* Update Upload Edc Unmatchs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('upload_edc_unmatch_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('MERCHANT_DBA_NAME', 'MERCHANT DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[25]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('TAHUN', 'TAHUN', 'trim|required|max_length[4]');
		$this->form_validation->set_rules('BULAN', 'BULAN', 'trim|required|max_length[5]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'MERCHANT_DBA_NAME' => $this->input->post('MERCHANT_DBA_NAME'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TAHUN' => $this->input->post('TAHUN'),
				'BULAN' => $this->input->post('BULAN'),
			];

			
			$save_upload_edc_unmatch = $this->model_upload_edc_unmatch->change($id, $save_data);

			if ($save_upload_edc_unmatch) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/upload_edc_unmatch', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/upload_edc_unmatch');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/upload_edc_unmatch');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Upload Edc Unmatchs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		// $this->is_allowed('upload_edc_unmatch_delete');

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
            set_message(cclang('has_been_deleted', 'upload_edc_unmatch'), 'success');
        } else {
            set_message(cclang('error_delete', 'upload_edc_unmatch'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Upload Edc Unmatchs
	*
	* @var $id String
	*/
	public function view($id)
	{
		// $this->is_allowed('upload_edc_unmatch_view');

		$this->data['upload_edc_unmatch'] = $this->model_upload_edc_unmatch->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Upload Edc Unmatch Detail');
		$this->render('backend/standart/administrator/upload_edc_unmatch/upload_edc_unmatch_view', $this->data);
	}
	
	/**
	* delete Upload Edc Unmatchs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$upload_edc_unmatch = $this->model_upload_edc_unmatch->find($id);

		
		
		return $this->model_upload_edc_unmatch->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('upload_edc_unmatch_export');

		$this->model_upload_edc_unmatch->export('upload_edc_unmatch', 'upload_edc_unmatch');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('upload_edc_unmatch_export');

		$this->model_upload_edc_unmatch->pdf('upload_edc_unmatch', 'upload_edc_unmatch');
	}
}


/* End of file upload_edc_unmatch.php */
/* Location: ./application/controllers/administrator/Upload Edc Unmatch.php */