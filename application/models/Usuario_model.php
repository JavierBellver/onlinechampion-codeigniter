<?php
 
class Usuario_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_usuario($id)
    {
        return $this->db->get_where('usuario',array('id'=>$id))->row_array();
    }

    function get_all_usuario()
    {
        return $this->db->get('usuario')->result_array();
    }

    function get_usuario_by_login_info($params)
    {
        return $this->db->get_where('usuario',$params)->row_array();
    }

    function get_usuarios_by_equipo($params)
    {
        return $this->db->get_where('usuario',$params)->result_array();
    }

    function add_usuario($params)
    {
        $this->db->insert('usuario',$params);
        return $this->db->insert_id();
    }

    function update_usuario($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('usuario',$params);
        if($response)
        {
            return "usuario updated successfully";
        }
        else
        {
            return "Error occuring while updating usuario";
        }
    }

    function delete_usuario($id)
    {
        $response = $this->db->delete('usuario',array('id'=>$id));
        if($response)
        {
            return "usuario deleted successfully";
        }
        else
        {
            return "Error occuring while deleting usuario";
        }
    }
}
