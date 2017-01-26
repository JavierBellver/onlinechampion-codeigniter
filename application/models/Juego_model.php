<?php
 
class Juego_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_juego($id)
    {
        return $this->db->get_where('juego',array('id'=>$id))->row_array();
    }

    function get_all_juego()
    {
        return $this->db->get('juego')->result_array();
    }

    function add_juego($params)
    {
        $this->db->insert('juego',$params);
        return $this->db->insert_id();
    }

    function update_juego($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('juego',$params);
        if($response)
        {
            return "juego updated successfully";
        }
        else
        {
            return "Error occuring while updating juego";
        }
    }

    function delete_juego($id)
    {
        $response = $this->db->delete('juego',array('id'=>$id));
        if($response)
        {
            return "juego deleted successfully";
        }
        else
        {
            return "Error occuring while deleting juego";
        }
    }
}
