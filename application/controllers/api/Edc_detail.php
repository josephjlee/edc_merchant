<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Edc_detail extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_edc_detail');
	}

	/**
	 * @api {get} /edc_detail/all Get all edc_details.
	 * @apiVersion 0.1.0
	 * @apiName AllEdcdetail 
	 * @apiGroup edc_detail
	 * @apiHeader {String} X-Api-Key Edc details unique access-key.
	 * @apiPermission Edc detail Cant be Accessed permission name : api_edc_detail_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Edc details.
	 * @apiParam {String} [Field="All Field"] Optional field of Edc details : MID, MERCHANT_DBA_NAME, STATUS_EDC, CITY, ID_NUMBER, MSO, SOURCE_CODE, POS_1, WILAYAH, CHANNEL, TYPE_MID, OPEN_DATE, TAHUN, BULAN, generate_at, update_at.
	 * @apiParam {String} [Start=0] Optional start index of Edc details.
	 * @apiParam {String} [Limit=10] Optional limit data of Edc details.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of edc_detail.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataEdc detail Edc detail data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_edc_detail_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['MID', 'MERCHANT_DBA_NAME', 'STATUS_EDC', 'CITY', 'ID_NUMBER', 'MSO', 'SOURCE_CODE', 'POS_1', 'WILAYAH', 'CHANNEL', 'TYPE_MID', 'OPEN_DATE', 'TAHUN', 'BULAN', 'generate_at', 'update_at'];
		$edc_details = $this->model_api_edc_detail->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_edc_detail->count_all($filter, $field);

		$data['edc_detail'] = $edc_details;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Edc detail',
			'data'	 	=> $data,
			'total' 	=> $total
		], API::HTTP_OK);
	}

	
	/**
	 * @api {get} /edc_detail/detail Detail Edc detail.
	 * @apiVersion 0.1.0
	 * @apiName DetailEdc detail
	 * @apiGroup edc_detail
	 * @apiHeader {String} X-Api-Key Edc details unique access-key.
	 * @apiPermission Edc detail Cant be Accessed permission name : api_edc_detail_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Edc details.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of edc_detail.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Edc detailNotFound Edc detail data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_edc_detail_detail', false);

		$this->requiredInput(['MID']);

		$id = $this->get('MID');

		$select_field = ['MID', 'MERCHANT_DBA_NAME', 'STATUS_EDC', 'CITY', 'ID_NUMBER', 'MSO', 'SOURCE_CODE', 'POS_1', 'WILAYAH', 'CHANNEL', 'TYPE_MID', 'OPEN_DATE', 'TAHUN', 'BULAN', 'generate_at', 'update_at'];
		$data['edc_detail'] = $this->model_api_edc_detail->find($id, $select_field);

		if ($data['edc_detail']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Edc detail',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Edc detail not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /edc_detail/add Add Edc detail.
	 * @apiVersion 0.1.0
	 * @apiName AddEdc detail
	 * @apiGroup edc_detail
	 * @apiHeader {String} X-Api-Key Edc details unique access-key.
	 * @apiPermission Edc detail Cant be Accessed permission name : api_edc_detail_add
	 *
 	 * @apiParam {String} MERCHANT_DBA_NAME Mandatory MERCHANT_DBA_NAME of Edc details. Input MERCHANT DBA NAME Max Length : 255. 
	 * @apiParam {String} STATUS_EDC Mandatory STATUS_EDC of Edc details. Input STATUS EDC Max Length : 11. 
	 * @apiParam {String} CITY Mandatory CITY of Edc details. Input CITY Max Length : 255. 
	 * @apiParam {String} ID_NUMBER Mandatory ID_NUMBER of Edc details. Input ID NUMBER Max Length : 11. 
	 * @apiParam {String} MSO Mandatory MSO of Edc details. Input MSO Max Length : 25. 
	 * @apiParam {String} SOURCE_CODE Mandatory SOURCE_CODE of Edc details. Input SOURCE CODE Max Length : 255. 
	 * @apiParam {String} POS_1 Mandatory POS_1 of Edc details. Input POS 1 Max Length : 11. 
	 * @apiParam {String} WILAYAH Mandatory WILAYAH of Edc details. Input WILAYAH Max Length : 100. 
	 * @apiParam {String} CHANNEL Mandatory CHANNEL of Edc details. Input CHANNEL Max Length : 100. 
	 * @apiParam {String} TYPE_MID Mandatory TYPE_MID of Edc details. Input TYPE MID Max Length : 100. 
	 * @apiParam {String} OPEN_DATE Mandatory OPEN_DATE of Edc details.  
	 * @apiParam {String} TAHUN Mandatory TAHUN of Edc details. Input TAHUN Max Length : 4. 
	 * @apiParam {String} BULAN Mandatory BULAN of Edc details. Input BULAN Max Length : 5. 
	 * @apiParam {String} Generate_at Mandatory generate_at of Edc details.  
	 * @apiParam {String} Update_at Mandatory update_at of Edc details.  
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function add_post()
	{
		$this->is_allowed('api_edc_detail_add', false);

		$this->form_validation->set_rules('MERCHANT_DBA_NAME', 'MERCHANT DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('CITY', 'CITY', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ID_NUMBER', 'ID NUMBER', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[25]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS_1', 'POS 1', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('TYPE_MID', 'TYPE MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('TAHUN', 'TAHUN', 'trim|required|max_length[4]');
		$this->form_validation->set_rules('BULAN', 'BULAN', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('generate_at', 'Generate At', 'trim|required');
		$this->form_validation->set_rules('update_at', 'Update At', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'MERCHANT_DBA_NAME' => $this->input->post('MERCHANT_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'CITY' => $this->input->post('CITY'),
				'ID_NUMBER' => $this->input->post('ID_NUMBER'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS_1' => $this->input->post('POS_1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TYPE_MID' => $this->input->post('TYPE_MID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'TAHUN' => $this->input->post('TAHUN'),
				'BULAN' => $this->input->post('BULAN'),
				'generate_at' => $this->input->post('generate_at'),
				'update_at' => $this->input->post('update_at'),
			];
			
			$save_edc_detail = $this->model_api_edc_detail->store($save_data);

			if ($save_edc_detail) {
				$this->response([
					'status' 	=> true,
					'message' 	=> 'Your data has been successfully stored into the database'
				], API::HTTP_OK);

			} else {
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('data_not_change')
				], API::HTTP_NOT_ACCEPTABLE);
			}

		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> validation_errors()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	/**
	 * @api {post} /edc_detail/update Update Edc detail.
	 * @apiVersion 0.1.0
	 * @apiName UpdateEdc detail
	 * @apiGroup edc_detail
	 * @apiHeader {String} X-Api-Key Edc details unique access-key.
	 * @apiPermission Edc detail Cant be Accessed permission name : api_edc_detail_update
	 *
	 * @apiParam {String} MERCHANT_DBA_NAME Mandatory MERCHANT_DBA_NAME of Edc details. Input MERCHANT DBA NAME Max Length : 255. 
	 * @apiParam {String} STATUS_EDC Mandatory STATUS_EDC of Edc details. Input STATUS EDC Max Length : 11. 
	 * @apiParam {String} CITY Mandatory CITY of Edc details. Input CITY Max Length : 255. 
	 * @apiParam {String} ID_NUMBER Mandatory ID_NUMBER of Edc details. Input ID NUMBER Max Length : 11. 
	 * @apiParam {String} MSO Mandatory MSO of Edc details. Input MSO Max Length : 25. 
	 * @apiParam {String} SOURCE_CODE Mandatory SOURCE_CODE of Edc details. Input SOURCE CODE Max Length : 255. 
	 * @apiParam {String} POS_1 Mandatory POS_1 of Edc details. Input POS 1 Max Length : 11. 
	 * @apiParam {String} WILAYAH Mandatory WILAYAH of Edc details. Input WILAYAH Max Length : 100. 
	 * @apiParam {String} CHANNEL Mandatory CHANNEL of Edc details. Input CHANNEL Max Length : 100. 
	 * @apiParam {String} TYPE_MID Mandatory TYPE_MID of Edc details. Input TYPE MID Max Length : 100. 
	 * @apiParam {String} OPEN_DATE Mandatory OPEN_DATE of Edc details.  
	 * @apiParam {String} TAHUN Mandatory TAHUN of Edc details. Input TAHUN Max Length : 4. 
	 * @apiParam {String} BULAN Mandatory BULAN of Edc details. Input BULAN Max Length : 5. 
	 * @apiParam {String} Generate_at Mandatory generate_at of Edc details.  
	 * @apiParam {String} Update_at Mandatory update_at of Edc details.  
	 * @apiParam {Integer} MID Mandatory MID of Edc Detail.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function update_post()
	{
		$this->is_allowed('api_edc_detail_update', false);

		
		$this->form_validation->set_rules('MERCHANT_DBA_NAME', 'MERCHANT DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('CITY', 'CITY', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ID_NUMBER', 'ID NUMBER', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[25]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS_1', 'POS 1', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('TYPE_MID', 'TYPE MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('TAHUN', 'TAHUN', 'trim|required|max_length[4]');
		$this->form_validation->set_rules('BULAN', 'BULAN', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('generate_at', 'Generate At', 'trim|required');
		$this->form_validation->set_rules('update_at', 'Update At', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'MERCHANT_DBA_NAME' => $this->input->post('MERCHANT_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'CITY' => $this->input->post('CITY'),
				'ID_NUMBER' => $this->input->post('ID_NUMBER'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS_1' => $this->input->post('POS_1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TYPE_MID' => $this->input->post('TYPE_MID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'TAHUN' => $this->input->post('TAHUN'),
				'BULAN' => $this->input->post('BULAN'),
				'generate_at' => $this->input->post('generate_at'),
				'update_at' => $this->input->post('update_at'),
			];
			
			$save_edc_detail = $this->model_api_edc_detail->change($this->post('MID'), $save_data);

			if ($save_edc_detail) {
				$this->response([
					'status' 	=> true,
					'message' 	=> 'Your data has been successfully updated into the database'
				], API::HTTP_OK);

			} else {
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('data_not_change')
				], API::HTTP_NOT_ACCEPTABLE);
			}

		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> validation_errors()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
	/**
	 * @api {post} /edc_detail/delete Delete Edc detail. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteEdc detail
	 * @apiGroup edc_detail
	 * @apiHeader {String} X-Api-Key Edc details unique access-key.
	 	 * @apiPermission Edc detail Cant be Accessed permission name : api_edc_detail_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Edc details .
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function delete_post()
	{
		$this->is_allowed('api_edc_detail_delete', false);

		$edc_detail = $this->model_api_edc_detail->find($this->post('MID'));

		if (!$edc_detail) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Edc detail not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_edc_detail->remove($this->post('MID'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Edc detail deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Edc detail not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

}

/* End of file Edc detail.php */
/* Location: ./application/controllers/api/Edc detail.php */