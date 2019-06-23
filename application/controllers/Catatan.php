<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Brunei');
	}

	public function index(){
		$this->beranda();
	}

	public function beranda(){
		$config['base_url'] = base_url() . 'halaman'; //site url
        $config['total_rows'] = $this->db->order_by('id', 'DESC')->get('catatan')->num_rows(); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $this->pagination->initialize($config);

        $halaman = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data = $this->db->order_by('id', 'DESC')->get('catatan', $config["per_page"], $halaman)->result();
 
        $pagination = $this->pagination->create_links();

		$judul = 'Beranda';
		$isi = 'catatan/tampil';
		$modul = null;
		$this->load->view('template/kosongan', compact('judul', 'isi', 'data', 'pagination', 'modul'));
	}

	public function baru(){
		if (!$_POST){
			$judul = 'Baru';
			$isi = 'catatan/form';
			$data = null;
			$this->load->view('template/kosongan', compact('judul', 'isi', 'data'));
		} else {
			$data = (object) $this->input->post();
			$data->tanggal = date('Y-m-d H:i:s');
			$this->db->insert('catatan', $data);
			redirect(base_url());
		}
	}

	public function edit($id){
		if (!$_POST){
			$judul = 'Edit';
			$isi = 'catatan/form';
			$data = $this->db->get_where('catatan', compact('id'))->result_array()[0];
			$this->load->view('template/kosongan', compact('judul', 'isi', 'data'));
		} else {
			$data = (object) $this->input->post();
			$this->db->update('catatan', $data, compact('id'));
			redirect(base_url() . 'jurnal/' . $id);
		}
	}

	public function detail($id){
		$data = $this->db->get_where('catatan', compact('id'))->result()[0];
		$judul = $data->judul;
		$isi = 'catatan/detail';
		$this->load->view('template/kosongan', compact('judul', 'isi', 'data'));
	}

	public function hapus($id){
		$this->db->delete('catatan', compact('id'));
		redirect(base_url());
	}

	public function kosong(){
		redirect(base_url());
	}

	public function cari(){
		$query = $this->input->get('cari');
		$data = $this->db->like('judul', $query)->or_like('isi', $query)->order_by('id', 'DESC')->get('catatan')->result();
		$judul = 'Hasil Pencarian';
		$isi = 'catatan/tampil';
		$pagination = null;
		$modul = 'cari';
		$this->load->view('template/kosongan', compact('judul', 'isi', 'data', 'pagination', 'modul', 'query'));
	}
}
