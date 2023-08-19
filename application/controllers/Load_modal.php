<?php
defined('BASEPATH') or exit('Npo direct script access allowed');

class Load_modal extends MY_Controller
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


		$this->web = 'content/v_home_coba';
		$this->layout();
	}

	public function get_modal_content_laptop()
	{
		$laptopId = $this->input->post('laptop_id');
		$this->data['website'] = $this->db->get('tbl_website')->row();
		$modalLaptop = $this->db->query("SELECT * FROM tbl_detail_laptop WHERE id_img_laptop = '" . $laptopId . "'")->row();

		$numberAPI = $this->data['website']->phone;
		$n1API = substr($numberAPI, 1);
		$apiWa = $n1API;

		$waLink = "https://api.whatsapp.com/send?phone=62$apiWa&text=Hallo%20Admin%20Emco%20Shop,%20Saya%20tertarik%20pada%20laptop%20$modalLaptop->slug...%21%0AMau%20minta%20rekomendasi%20harga%20terbaik%20buat%20laptopnya.%0ATerimakasih%20%E2%98%BA%EF%B8%8F%F0%9F%99%8F";


		// Proceed to load the modal content (similar to the previous foreach loop)
		// Ensure you use $modalLaptop instead of $this->db->query in the view file for the modal content
		$data['modalLaptop'] = $modalLaptop;
		$data['waLink'] = $waLink;
		$this->load->view('content/modal_content', $data);
	}
}
