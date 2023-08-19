<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{

	//set the class variable.
	var $template  = array();
	var $data      = array();
	//Load layout    
	public function layout()
	{
		date_default_timezone_set("Asia/Jakarta");

		$this->CI = &get_instance();
		// $this->data['menu']=$this->menu(0,$h="");
		$this->data['website'] = $this->CI->db->get('tbl_website')->row();
		$this->data['sosmed'] = $this->CI->db->get('tbl_sosmed')->result();
		$this->data['homeweb'] = $this->CI->db->get('tbl_homeweb')->row();
		$this->data['produk'] = $this->CI->db->get('tbl_produk')->result();

		$this->data['n1'] = $this->CI->db->get_where('tbl_navigation', array('id' => 1, 'status' => 1))->row();
		$this->data['n2'] = $this->CI->db->get_where('tbl_navigation', array('id' => 2, 'status' => 1))->row();
		$this->data['n3'] = $this->CI->db->get_where('tbl_navigation', array('id' => 3, 'status' => 1))->row();
		$this->data['n4'] = $this->CI->db->get_where('tbl_navigation', array('id' => 4, 'status' => 1))->row();
		$this->data['n5'] = $this->CI->db->get_where('tbl_navigation', array('id' => 5, 'status' => 1))->row();
		$this->data['n6'] = $this->CI->db->get_where('tbl_navigation', array('id' => 6, 'status' => 1))->row();
		$this->data['n7'] = $this->CI->db->get_where('tbl_navigation', array('id' => 7, 'status' => 1))->row();
		$this->data['n8'] = $this->CI->db->get_where('tbl_navigation', array('id' => 8, 'status' => 1))->row();

		$this->data['today'] = $this->getCounter('today'); //hari ini
		$this->data['online'] = $this->getCounter('online'); //hari ini online
		$this->data['all'] = $this->getCounter('all'); //semua visitor

		$this->template['header']   = $this->load->view('layout/header', $this->data); //, $this->data

		$this->template['web'] = $this->load->view($this->web, $this->data); //, $this->data
		$this->template['footer'] = $this->load->view('layout/footer', $this->data); //, $this->data
		$this->initCounter(); //insert statistik

	}

	function initCounter()
	{

		$ip = $_SERVER['REMOTE_ADDR']; // menangkap ip pengunjung
		$location = 'https://shop.digitalindo.co.id' . $_SERVER['PHP_SELF']; // menangkap server path

		//membuat log dalam tabel database 'counter'
		$check = $this->db->query("select * from tbl_counter where ip='" . $ip . "' and date(`timestamp`)=CURDATE()");
		$check2 = $check->row();
		if ($check->num_rows() > 0) {

			$create_log = $this->db->query("UPDATE tbl_counter SET `timestamp`=NOW() WHERE id='" . $check2->id . "'");
		} else {
			$create_log = $this->db->query("INSERT INTO tbl_counter(ip,location,`timestamp`)VALUES('$ip', '$location',NOW()) ");
		}
	}


	function getCounter($mode)
	{

		$now = date("Y-m-d H:i:s");
		$today = date("Y-m-d");

		$this->db->db_select('nasabbal_web');

		// if(is_null($location)) {
		//      $location = $_SERVER['PHP_SELF'];
		// }
		if ($mode == "today") // query perhitungan IP Address unik
		{
			$get_res = $this->db->query("SELECT DISTINCT count(a.ip) as jml FROM (SELECT * FROM tbl_counter GROUP BY ip, DATE(timestamp)) a where date(a.timestamp)=CURDATE() ");
		} else if ($mode == "online") {
			// $bataswaktu = time() - 300;
			// $get_res  = $this->db->query("SELECT * FROM tbl_counter WHERE timestamp > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online

			$get_res = $this->db->query("SELECT DISTINCT count(ip) as jml FROM tbl_counter where `timestamp` BETWEEN DATE_ADD('$now', INTERVAL -10 minute) AND '$now' AND date(`timestamp`)='$today'");
		} else { // query perhitungan seluruh IP Address (tidak unik)
			$get_res = $this->db->query("SELECT count(a.ip) as jml FROM (SELECT * FROM tbl_counter GROUP BY ip, DATE(timestamp)) a");
		}

		$res = $get_res->row();

		return $res;
	}
}
