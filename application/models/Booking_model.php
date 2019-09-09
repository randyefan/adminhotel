<?php

class Booking_model extends CI_model
{
    public function getAllBooking()
    {
        return $this->db->get('tbl_booking')->result_array();
    }

    public function JoinBooking()
    {
        $this->db->select('*');
        $this->db->from('tbl_booking');
        $this->db->join('tbl_room', 'tbl_room.IDroom = tbl_booking.IDbook');
        $this->db->join('customer', 'customer.IDcustomer = tbl_booking.IDbook');
        $query = $this->db->get();
        return $query->result();

        if ($query) {
            echo 'berhasil';
            die();
        } else {
            echo 'gagal';
            die();
        }
    }
}
