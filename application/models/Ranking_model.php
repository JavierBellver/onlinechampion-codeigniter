<?php
 
class Ranking_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_ranking($id)
    {
        return $this->db->get_where('ranking',array('id'=>$id))->row_array();
    }

    function get_users_by_ranking($id)
    {
        $userNamesSql = 'SELECT * FROM usuario INNER JOIN usuarioranking ON usuarioranking.idUsuario = usuario.id WHERE usuarioranking.idRanking = ?';
        $userDataSql = 'SELECT * FROM usuarioranking WHERE idRanking = ?';
        $usersNames = $this->db->query($userNamesSql,array($id))->result();
        $usersData = $this->db->query($userDataSql,array($id))->result();
        $resultarray = array();
        foreach ($usersNames as $row)
        {
            $userData = new stdClass();
            foreach ($usersData as $d)
            {
                if($row->id == $d->idUsuario)
                {
                    $userData = $d;
                }
            }
            $result = new stdClass();
            $result->id = $row->id;
            $result->login = $row->login;
            $result->puntos = $userData->puntos;
            $result->jugadas = $userData->jugadas;
            $result->ganadas = $userData->ganadas;
            array_push($resultarray,$result);
        }
        return $resultarray;
    }

    function get_all_ranking()
    {
        return $this->db->get('ranking')->result_array();
    }

    function add_ranking($params)
    {
        $this->db->insert('ranking',$params);
        return $this->db->insert_id();
    }

    function update_ranking($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('ranking',$params);
        if($response)
        {
            return "ranking updated successfully";
        }
        else
        {
            return "Error occuring while updating ranking";
        }
    }

    function delete_ranking($id)
    {
        $response = $this->db->delete('ranking',array('id'=>$id));
        if($response)
        {
            return "ranking deleted successfully";
        }
        else
        {
            return "Error occuring while deleting ranking";
        }
    }
}
