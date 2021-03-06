<?php

class Equipo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_equipo($id)
    {
        return $this->db->get_where('equipo',array('id'=>$id))->row_array();
    }

    function get_all_equipo()
    {
        return $this->db->get('equipo')->result_array();
    }

    function add_equipo($params)
    {
        $this->db->insert('equipo',$params);
        return $this->db->insert_id();
    }

    function update_equipo($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('equipo',$params);
        if($response)
        {
            return "equipo updated successfully";
        }
        else
        {
            return "Error occuring while updating equipo";
        }
    }

    function delete_equipo($id)
    {
        $response = $this->db->delete('equipo',array('id'=>$id));
        if($response)
        {
            return "equipo deleted successfully";
        }
        else
        {
            return "Error occuring while deleting equipo";
        }
    }
}

