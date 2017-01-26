<?php
 
class Liga_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_liga($id)
    {
        return $this->db->get_where('liga',array('id'=>$id))->row_array();
    }

    function get_all_liga()
    {
        return $this->db->get('liga')->result_array();
    }

    function add_liga($params)
    {
        $this->db->insert('liga',$params);
        return $this->db->insert_id();
    }

    function update_liga($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('liga',$params);
        if($response)
        {
            return "liga updated successfully";
        }
        else
        {
            return "Error occuring while updating liga";
        }
    }

    function delete_liga($id)
    {
        $response = $this->db->delete('liga',array('id'=>$id));
        if($response)
        {
            return "liga deleted successfully";
        }
        else
        {
            return "Error occuring while deleting liga";
        }
    }
}
