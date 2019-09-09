<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Room extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hotel_model');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        function rupiah($angka)
        {
            $hasil_rupiah = "Rp. " . number_format($angka, 2, ',', '.');
            return $hasil_rupiah;
        }

        $data['hotel'] = $this->Hotel_model->getAllHotel();
        $data['room'] = $this->Hotel_model->joinHotelroom();

        $this->load->view('admin_header');
        $this->load->view('Room', $data);
        $this->load->view('admin_footer');
    }

    public function tambah()
    {
        $config['upload_path']          = './uploads/room';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('imagee')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            $fullpath = $this->upload->data('file_name');

            $data = [
                "roomtipe" => $this->input->post('tiperoom', true),
                "roomharga" => $this->input->post('roomharga', true),
                "roompict" => $fullpath,
                "roomcapacity" => $this->input->post('kapasitas', true),
                "idhotelroom" => $this->input->post('IDhotel', true),
            ];

            $this->Hotel_model->tambahRoom($data);
            redirect('Room');
        }
    }

    public function hapus($id)
    {
        $this->Hotel_model->hapusdataroom($id);
        redirect('Room');
    }

    function edit()
    {

        $id = $this->input->post('idroom');
        $tipe = $this->input->post('tiperoom');
        $roomharga = $this->input->post('roomharga');
        $kapasitas = $this->input->post('kapasitas');
        $idhotel = $this->input->post('IDhotel');
        $data_kode = array('IDroom' => $id);
        $foto = $this->db->get_where('tbl_room', $data_kode);

        $config['upload_path']          = './uploads/room';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('imagee')) {
            $finfo = $this->upload->data();
            $nama_foto = $finfo['file_name'];

            $data_room = array(
                'roomtipe' => $tipe,
                'roomharga' => $roomharga,
                'roompict' => $nama_foto,
                'roomcapacity' => $kapasitas,
                'IDhotelroom' => $idhotel,
            );

            $config2 = array(
                'source_image' => 'uploads/room' . $nama_foto,
                'image_library' => 'gd2',
                'new_image' => 'uploads/thumbnail',
                'maintain_ratio' => true,
            );

            $this->load->library('image_lib', $config2);
            $this->image_lib->resize();
        } else {
            $data_room = array(
                'roomtipe' => $tipe,
                'roomharga' => $roomharga,
                'roomcapacity' => $kapasitas,
                'IDhotelroom' => $idhotel,
            );
        }

        $this->Hotel_model->editdataRoom($data_kode, $data_room);
        redirect('Room');
    }
}
