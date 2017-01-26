<?php
 
class Torneo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_torneo($id)
    {
        return $this->db->get_where('torneo',array('id'=>$id))->row_array();
    }

    function get_all_torneo()
    {
        return $this->db->get('torneo')->result_array();
    }

    function add_torneo($params)
    {
        $this->db->insert('torneo',$params);
        return $this->db->insert_id();
    }

    function update_torneo($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('torneo',$params);
        if($response)
        {
            return "torneo updated successfully";
        }
        else
        {
            return "Error occuring while updating torneo";
        }
    }

    function delete_torneo($id)
    {
        $response = $this->db->delete('torneo',array('id'=>$id));
        if($response)
        {
            return "torneo deleted successfully";
        }
        else
        {
            return "Error occuring while deleting torneo";
        }
    }
}
