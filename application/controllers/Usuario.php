<?php
 
class Usuario extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->model('Equipo_model');
        $this->load->library('session');
    } 

    function index()
    {
        $data['usuario'] = $this->Usuario_model->get_all_usuario();
        $this->load->view('usuario/index',$data);
    }

    function login()
    {
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('login','Login','required|max_length[15]');
        $this->form_validation->set_rules('password','Password','required|max_length[12]');

        if($this->form_validation->run())
        {
            $params = array(
                'login' => $this->input->post('login'),
                'password' => $this->input->post('password')
            );
            $usuario_id = $this->Usuario_model->get_usuario_by_login_info($params);
            if(isset($usuario_id))
            {
                $data = array(
                    'id' => $usuario_id['id'],
                    'usuario' => $this->input->post('login'),
                    'password' => $this->input->post('password'),
                    'loggedIn' => TRUE
                );
                $this->session->set_userdata($data);
                if(isset($_SESSION['loggedIn']))
                {
                    redirect('home/index');
                }
            }
            else
            {
                redirect('usuario/login');
            }
        }
        else
        {
            $this->load->view('usuario/login');
        }
    }

    function read($id)
    {
        $data['usuario'] = $this->Usuario_model->get_usuario($id);
        $data['equipo'] = $this->Equipo_model->get_equipo($data['usuario']['idEquipo']);
        $params = array(
          'idEquipo' => $data['usuario']['idEquipo'],
        );
        $data['usuariosequipo'] = $this->Usuario_model->get_usuarios_by_equipo($params);
        $this->load->view('usuario/detail',$data);
    }

    function logout()
    {
        $this->load->library('session');
        $data = array('usuario', 'password', 'loggedIn');
        $this->session->unset_userdata($data);
        $this->load->view('home/index');
    }

    function register()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('login','Login','required|max_length[15]');
        $this->form_validation->set_rules('password','Password','required|max_length[12]');
        $this->form_validation->set_rules('email','Email','required|max_length[20]|valid_email');
        $this->form_validation->set_rules('password-repeat','Password (repeat)','required|max_length[12]|matches[password]');

        if($this->form_validation->run())
        {
            $params = array(
                'login' => $this->input->post('login'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
            );
            $usuario_id = $this->Usuario_model->add_usuario($params);
            redirect('home/index');
        }
        else
        {
            $this->load->view('usuario/registro');
        }
    }

    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('login','Login','required|max_length[15]');
		$this->form_validation->set_rules('password','Password','required|max_length[12]');
		$this->form_validation->set_rules('email','Email','required|max_length[20]|valid_email');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'login' => $this->input->post('login'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
            );
            $usuario_id = $this->Usuario_model->add_usuario($params);
            redirect('usuario/index');
        }
        else
        {
            $this->load->view('usuario/add');
        }
    }  

    function edit($id)
    {
        $usuario = $this->Usuario_model->get_usuario($id);
        
        if(isset($usuario['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('login','Login','required|max_length[15]');
			$this->form_validation->set_rules('password','Password','required|max_length[12]');
			$this->form_validation->set_rules('email','Email','required|max_length[20]|valid_email');
		
			if($this->form_validation->run())     
            {
                $params = array(
					'login' => $this->input->post('login'),
					'password' => $this->input->post('password'),
					'email' => $this->input->post('email'),
                );
                $this->Usuario_model->update_usuario($id,$params);            
                redirect('usuario/index');
            }
            else
            {   
                $data['usuario'] = $this->Usuario_model->get_usuario($id);
                $this->load->view('usuario/edit',$data);
            }
        }
        else
            show_error('The usuario you are trying to edit does not exist.');
    } 

    function remove($id)
    {
        $usuario = $this->Usuario_model->get_usuario($id);

        if(isset($usuario['id']))
        {
            $this->Usuario_model->delete_usuario($id);
            redirect('usuario/index');
        }
        else
            show_error('The usuario you are trying to delete does not exist.');
    }
}
