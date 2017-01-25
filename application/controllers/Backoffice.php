<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 21/01/2017
 * Time: 11:32
 */
class Backoffice extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Juego_model');
        $this->load->model('Liga_model');
        $this->load->model('Torneo_model');
    }

    function index()
    {


        $this->load->view('Backoffice/index');
    }

    function Juegos()
    {
        $data['Juegos'] = $this->Juego_model->get_all_juego();
        $this->load->view('Backoffice/Juego/index',$data);
    }

    function Ligas()
    {
        $data['liga']=$this->Liga_model->get_all_liga();
        $this->load->view('Backoffice/Liga/index',$data);

    }

    function Torneos()
    {
        $data['Torneos']=$this->Torneo_model->get_all_torneo();
        $this->load->view('Backoffice/Torneo/index',$data);

    }

    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre','Nombre','required|max_length[30]');
        $this->form_validation->set_rules('descripcion','Descripcion','required');
        $this->form_validation->set_rules('categoria','Categoria','required|max_length[20]');

        if($this->form_validation->run())
        {
            $params = array(
                'nombre' => $this->input->post('nombre'),
                'descripcion' => $this->input->post('descripcion'),
                'categoria' => $this->input->post('categoria'),
            );

            $juego_id = $this->Juego_model->add_juego($params);
            redirect('juego/index');
        }
        else
        {
            $this->load->view('juego/add');
        }
    }

    /*
     * Editing a juego
     */
    function edit($id)
    {
        // check if the juego exists before trying to edit it
        $juego = $this->Juego_model->get_juego($id);

        if(isset($juego['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nombre','Nombre','required|max_length[30]');
            $this->form_validation->set_rules('descripcion','Descripcion','required');
            $this->form_validation->set_rules('categoria','Categoria','required|max_length[20]');

            if($this->form_validation->run())
            {
                $params = array(
                    'nombre' => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'categoria' => $this->input->post('categoria'),
                );

                $this->Juego_model->update_juego($id,$params);
                redirect('juego/index');
            }
            else
            {
                $data['juego'] = $this->Juego_model->get_juego($id);

                $this->load->view('juego/edit',$data);
            }
        }
        else
            show_error('The juego you are trying to edit does not exist.');
    }

    /*
     * Deleting juego
     */
    function remove($id)
    {
        $juego = $this->Juego_model->get_juego($id);

        // check if the juego exists before trying to delete it
        if(isset($juego['id']))
        {
            $this->Juego_model->delete_juego($id);
            redirect('juego/index');
        }
        else
            show_error('The juego you are trying to delete does not exist.');
    }

}