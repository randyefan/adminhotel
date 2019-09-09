<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_model', 'book');
        $this->load->model('Hotel_model', 'htl');
    }

    public function index()
    {
        $data['booking'] = $this->book->getAllBooking();
        $data['Hotel'] = $this->htl->joinHotelroom();
        $this->load->view('admin_header');
        $this->load->view('booking', $data);
        $this->load->view('admin_footer');
    }
}
