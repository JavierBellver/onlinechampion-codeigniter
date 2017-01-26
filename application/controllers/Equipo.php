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

    function invite()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id','Id','required|integer');
        $this->form_validation->set_rules('idEquipo','IdEquipo','required|integer');

        if($this->form_validation->run())
        {
            $params = array(
                'idEquipo' => $this->input->post('idEquipo'),
            );
            $usuario_id = $this->Usuario_model->update_usuario($this->input->post('id'),$params);
            redirect('usuario/read/'.$this->input->post('id'));
        }
        else
        {
            $data['usuarios'] = $this->Usuario_model->get_all_usuario();
            $data['idequipo'] = $this->Usuario_model->get_usuario($this->session->id)['idEquipo'];
            $this->load->view('equipo/invite',$data);
        }
    }
}