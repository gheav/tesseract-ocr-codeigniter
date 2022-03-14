<?php
defined('BASEPATH') or exit('No direct script access allowed');

use thiagoalessio\TesseractOCR\TesseractOCR;

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->TesseractOCR = new TesseractOCR();
	}

	public function index()
	{
		$this->load->view('layouts/main', [
			'content' 	=> 'welcome',
			'Lang'		=> $this->TesseractOCR->availableLanguages()
		]);
	}

	public function ocr()
	{
		if ($this->input->post('recent')) unlink('./uploads/' . $this->input->post('recent'));
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['overwrite']            = true;
		$config['encrypt_name']         = true;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('captchaInput')) {
			$uploadCaptcha 	= $this->upload->data();
			$psm			= $this->input->post('psm');
			$tesseractOCR 	= (new TesseractOCR('uploads/' . $uploadCaptcha['file_name']))
				->psm($psm)->withoutTempFiles()->run();
			$this->load->view('layouts/main', [
				'content' 		=> 'results',
				'uploadCaptcha'	=> $uploadCaptcha,
				'tesseract'		=> $tesseractOCR,
				'Lang'			=> $this->TesseractOCR->availableLanguages()
			]);
		} else {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url());
		}
	}
}
