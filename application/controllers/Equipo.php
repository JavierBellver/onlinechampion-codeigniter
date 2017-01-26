<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Equipo_model');
        $this->load->model('Usuario_model');
        $this->load->library('session');
    }

    function index()
    {
        $data['equipo'] = $this->Equipo_model->get_all_equipo();
        $this->load->view('equipo/index',$data);
    }

    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[20]');

        if($this->form_validation->run())
        {
            $params = array(
                'nombre' => $this->input->post('nombre'),
            );
            $equipo_id = $this->Equipo_model->add_equipo($params);
            if($this->session->has_userdata('usuario'))
            {
                $id = $this->session->userdata('id');
                $params = array(
                    'idEquipo' =>  $equipo_id,
                );
                if($this->Usuario_model->update_usuario($id,$params) == "usuario updated successfully")
                {
                    redirect('equipo/index');
                }
                else
                {
                    redirect('home/index');
                }
            }
        }
        else
        {
            $this->load->view('equipo/add');
        }
    }
}