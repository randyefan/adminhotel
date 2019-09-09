<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hotel_model');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('admin_header');
		$this->load->view('Dashboard');
		$this->load->view('admin_footer');
	}

	public function hotel()
	{
		$data['hotel'] = $this->Hotel_model->getAllHotel();
		$this->load->view('admin_header');
		$this->load->view('Hotel', $data);
		$this->load->view('admin_footer');
	}

	public function hapus($id)
	{
		$this->Hotel_model->hapusdatahotel($id);
		// $this->session->set_flashdata('flash', 'Dihapus');
		redirect('Dashboard/hotel');
	}

	public function do_upload()
	{
		$config['upload_path']          = './uploads/hotel';
		$config['allowed_types']        = 'gif|jpg|png';

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('imagee')) {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		} else {
			$fullpath = $this->upload->data('file_name');

			$data = [
				"hotelname" => $this->input->post('nama', true),
				"hoteldesc" => $this->input->post('deskripsi', true),
				"hotelstar" => $this->input->post('bintang', true),
				"location" => $this->input->post('lokasi', true),
				"phonenumber" => $this->input->post('phone', true),
				"hotelpict" => $fullpath,
			];

			$this->Hotel_model->tambahHotel($data);
			redirect('Dashboard/hotel');
		}
	}

	function edit()
	{

		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$bintang = $this->input->post('bintang');
		$lokasi = $this->input->post('lokasi');
		$phonenumber = $this->input->post('phone');
		$data_kode = array('IDhotel' => $id);
		$foto = $this->db->get_where('tbl_hotel', $data_kode);

		$config['upload_path']          = './uploads/hotel';
		$config['allowed_types']        = 'gif|jpg|png';

		$this->upload->initialize($config);

		if ($this->upload->do_upload('imageubah')) {

			$finfo = $this->upload->data();
			$nama_foto = $finfo['file_name'];

			$data_hotel = array(
				'hotelname' => $nama,
				'hoteldesc' => $deskripsi,
				'hotelstar' => $bintang,
				'location' => $lokasi,
				'phonenumber' => $phonenumber,
				'hotelpict' => $nama_foto,
			);

			$config2 = array(
				'source_image' => 'uploads/hotel' . $nama_foto,
				'image_library' => 'gd2',
				'new_image' => 'uploads/thumbnail',
				'maintain_ratio' => true,
			);

			$this->load->library('image_lib', $config2);
			$this->image_lib->resize();
		} else {
			echo "b";
			$data_hotel = array(
				'hotelname' => $nama,
				'hoteldesc' => $deskripsi,
				'hotelstar' => $bintang,
				'location' => $lokasi,
				'phonenumber' => $phonenumber,
			);
		}

		$this->Hotel_model->editdataHotel($data_kode, $data_hotel);
		redirect('Dashboard/hotel');
	}
}
