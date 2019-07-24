<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Mso_channel extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_mso_channel');
	}

	/**
	 * @api {get} /mso_channel/all Get all mso_channels.
	 * @apiVersion 0.1.0
	 * @apiName AllMsochannel 
	 * @apiGroup mso_channel
	 * @apiHeader {String} X-Api-Key Mso channels unique access-key.
	 * @apiPermission Mso channel Cant be Accessed permission name : api_mso_channel_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Mso channels.
	 * @apiParam {String} [Field="All Field"] Optional field of Mso channels : ID, Wilayah, KodeWilayah, MSO, Channel.
	 * @apiParam {String} [Start=0] Optional start index of Mso channels.
	 * @apiParam {String} [Limit=10] Optional limit data of Mso channels.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of mso_channel.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataMso channel Mso channel data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_mso_channel_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['ID', 'Wilayah', 'KodeWilayah', 'MSO', 'Channel'];
		$mso_channels = $this->model_api_mso_channel->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_mso_channel->count_all($filter, $field);

		$data['mso_channel'] = $mso_channels;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Mso channel',
			'data'	 	=> $data,
			'total' 	=> $total
		], API::HTTP_OK);
	}

	
	/**
	 * @api {get} /mso_channel/detail Detail Mso channel.
	 * @apiVersion 0.1.0
	 * @apiName DetailMso channel
	 * @apiGroup mso_channel
	 * @apiHeader {String} X-Api-Key Mso channels unique access-key.
	 * @apiPermission Mso channel Cant be Accessed permission name : api_mso_channel_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Mso channels.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of mso_channel.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Mso channelNotFound Mso channel data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_mso_channel_detail', false);

		$this->requiredInput(['ID']);

		$id = $this->get('ID');

		$select_field = ['ID', 'Wilayah', 'KodeWilayah', 'MSO', 'Channel'];
		$data['mso_channel'] = $this->model_api_mso_channel->find($id, $select_field);

		if ($data['mso_channel']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Mso channel',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Mso channel not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /mso_channel/add Add Mso channel.
	 * @apiVersion 0.1.0
	 * @apiName AddMso channel
	 * @apiGroup mso_channel
	 * @apiHeader {String} X-Api-Key Mso channels unique access-key.
	 * @apiPermission Mso channel Cant be Accessed permission name : api_mso_channel_add
	 *
 	 * @apiParam {String} Wilayah Mandatory Wilayah of Mso channels. Input Wilayah Max Length : 55. 
	 * @apiParam {String} KodeWilayah Mandatory KodeWilayah of Mso channels. Input KodeWilayah Max Length : 55. 
	 * @apiParam {String} MSO Mandatory MSO of Mso channels. Input MSO Max Length : 55. 
	 * @apiParam {String} Channel Mandatory Channel of Mso channels. Input Channel Max Length : 55. 
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
		$this->is_allowed('api_mso_channel_add', false);

		$this->form_validation->set_rules('Wilayah', 'Wilayah', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('KodeWilayah', 'KodeWilayah', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('Channel', 'Channel', 'trim|required|max_length[55]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'Wilayah' => $this->input->post('Wilayah'),
				'KodeWilayah' => $this->input->post('KodeWilayah'),
				'MSO' => $this->input->post('MSO'),
				'Channel' => $this->input->post('Channel'),
			];
			
			$save_mso_channel = $this->model_api_mso_channel->store($save_data);

			if ($save_mso_channel) {
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
	 * @api {post} /mso_channel/update Update Mso channel.
	 * @apiVersion 0.1.0
	 * @apiName UpdateMso channel
	 * @apiGroup mso_channel
	 * @apiHeader {String} X-Api-Key Mso channels unique access-key.
	 * @apiPermission Mso channel Cant be Accessed permission name : api_mso_channel_update
	 *
	 * @apiParam {String} Wilayah Mandatory Wilayah of Mso channels. Input Wilayah Max Length : 55. 
	 * @apiParam {String} KodeWilayah Mandatory KodeWilayah of Mso channels. Input KodeWilayah Max Length : 55. 
	 * @apiParam {String} MSO Mandatory MSO of Mso channels. Input MSO Max Length : 55. 
	 * @apiParam {String} Channel Mandatory Channel of Mso channels. Input Channel Max Length : 55. 
	 * @apiParam {Integer} ID Mandatory ID of Mso Channel.
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
		$this->is_allowed('api_mso_channel_update', false);

		
		$this->form_validation->set_rules('Wilayah', 'Wilayah', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('KodeWilayah', 'KodeWilayah', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('Channel', 'Channel', 'trim|required|max_length[55]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'Wilayah' => $this->input->post('Wilayah'),
				'KodeWilayah' => $this->input->post('KodeWilayah'),
				'MSO' => $this->input->post('MSO'),
				'Channel' => $this->input->post('Channel'),
			];
			
			$save_mso_channel = $this->model_api_mso_channel->change($this->post('ID'), $save_data);

			if ($save_mso_channel) {
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
	 * @api {post} /mso_channel/delete Delete Mso channel. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteMso channel
	 * @apiGroup mso_channel
	 * @apiHeader {String} X-Api-Key Mso channels unique access-key.
	 	 * @apiPermission Mso channel Cant be Accessed permission name : api_mso_channel_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Mso channels .
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
		$this->is_allowed('api_mso_channel_delete', false);

		$mso_channel = $this->model_api_mso_channel->find($this->post('ID'));

		if (!$mso_channel) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Mso channel not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_mso_channel->remove($this->post('ID'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Mso channel deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Mso channel not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

}

/* End of file Mso channel.php */
/* Location: ./application/controllers/api/Mso channel.php */