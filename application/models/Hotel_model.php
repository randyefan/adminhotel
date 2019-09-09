<?php

class Hotel_model extends CI_model
{

    public function joinHotelroom()
    {
        $this->db->select('*');
        $this->db->from('tbl_room');
        $this->db->join('tbl_hotel', 'tbl_hotel.IDhotel = tbl_room.IDhotelroom');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllHotel()
    {
        return $this->db->get('tbl_hotel')->result_array();
    }

    public function hapusdatahotel($id)
    {
        $this->db->where('IDhotel', $id);
        $this->db->delete('tbl_hotel');
    }

    public function hapusdataroom($id)
    {
        $this->db->where('IDroom', $id);
        $this->db->delete('tbl_room');
    }

    public function tambahHotel($data)
    {

        $this->db->insert('tbl_hotel', $data);
    }

    public function tambahRoom($data)
    {

        $this->db->insert('tbl_room', $data);
    }

    function editdataHotel($where, $table)
    {
        $id = $this->input->post('id');
        $this->db->where('IDhotel', $id);
        $this->db->update('tbl_hotel', $table);
    }

    function editdataRoom($where, $table)
    {
        $id = $this->input->post('idroom');
        $this->db->where('IDroom', $id);
        $this->db->update('tbl_room', $table);
    }
}
