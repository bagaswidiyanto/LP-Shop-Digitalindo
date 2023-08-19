<?php
defined('BASEPATH') or exit('Npo direct script access allowed');

class Welcome extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_data');
		$this->load->helper('url');
		$this->load->helper('download');
	}

	public function index()
	{
		$this->data['brand'] = $this->db->get('tbl_brand')->result();
		$this->data['about'] = $this->db->get('tbl_about')->row();
		$this->data['why_us'] = $this->db->get('tbl_why_us')->row();
		$this->data['keunggulan'] = $this->db->get('tbl_keunggulan')->result();
		$this->data['laptop'] = $this->db->get('tbl_laptop')->row();
		$this->data['tab_laptop'] = $this->db->get('tbl_master_tab_laptop')->result();
		$this->data['txt_laptop'] = $this->db->get('tbl_master_tab_laptop')->row();
		$this->data['printer'] = $this->db->get('tbl_printer')->row();
		$this->data['tab_printer'] = $this->db->get('tbl_master_tab_printer')->result();
		$this->data['txt_printer'] = $this->db->get('tbl_master_tab_printer')->row();
		$this->data['custom'] = $this->db->get('tbl_custom')->row();
		$this->data['tab_custom'] = $this->db->get('tbl_master_tab_custom')->result();
		$this->data['txt_custom'] = $this->db->get('tbl_master_tab_custom')->row();
		$this->data['aksesoris'] = $this->db->get('tbl_aksesoris')->row();
		$this->data['tab_aksesoris'] = $this->db->get('tbl_master_tab_aksesoris')->result();
		$this->data['txt_aksesoris'] = $this->db->get('tbl_master_tab_aksesoris')->row();


		$this->web = 'content/v_home';
		$this->layout();
	}
}
