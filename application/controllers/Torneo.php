<?php
 
class Torneo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Torneo_model');
        $this->load->model('Juego_model');
        $this->load->library('session');
    } 

    function index()
    {
        $data['torneo'] = $this->Torneo_model->get_all_torneo();

        if(isset($this->session->id['id'])) {
            $validated = array();

            foreach ($this->Torneo_model->get_all_torneo() as $t) {
                array_push($validated, $this->validate($t['id']));
            }
            $data['validated'] = $validated;
        }

        $this->load->view('torneo/index',$data);
    }

    function read($id)
    {
        $data['torneo'] = $this->Torneo_model->get_torneo($id);
        $this->load->view('torneo/detail',$data);
    }

    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('numjugadores','Numjugadores','required|integer');
		$this->form_validation->set_rules('numtemporadas','Numtemporadas','required|integer');

		if($this->form_validation->run())     
        {   
            $params = array(
				'numjugadores' => $this->input->post('numjugadores'),
				'numtemporadas' => $this->input->post('numtemporadas'),
                'juego' => $_POST['Juego'],
                '1Premio' => $this->input->post('1Premio'),
                '2Premio' => $this->input->post('2Premio'),
                '3Premio' => $this->input->post('3Premio'),
            );
            
            $torneo_id = $this->Torneo_model->add_torneo($params);
            $data['Torneos'] = $this->Torneo_model->get_all_torneo();
            $this->load->view('Backoffice/Torneo/index',$data);
        }
        else
        {
            $data['Juegos'] = $this->Juego_model->get_all_juego();
            $this->load->view('Backoffice/Torneo/add',$data);
        }
    }

    function validate($id)
    {
        $idUsu=$this->session->id['id'];
        $inscritos=$this->db->get_where('usuariotorneo',array('idTorneo'=>$id))->result_array();

        foreach ($inscritos as $row)
        {
            if($row['idUsuario']==$idUsu) return 1;
        }
        return 0;
    }

    function join($id){
        $idUsu=$this->session->id['id'];
        $params= array(
            'idTorneo'=>$id,
            'idUsuario'=>$idUsu,
        );
        $this->db->insert('usuarioTorneo',$params);
    }

    function edit($id)
    {
        $torneo = $this->Torneo_model->get_torneo($id);
        
        if(isset($torneo['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('numjugadores','Numjugadores','required|integer');
			$this->form_validation->set_rules('numtemporadas','Numtemporadas','required|integer');
		
			if($this->form_validation->run())     
            {   
                $params = array(
                    'numjugadores' => $this->input->post('numjugadores'),
                    'numtemporadas' => $this->input->post('numtemporadas'),
                    'juego' => $_POST['Juego'],
                    '1Premio' => $this->input->post('1Premio'),
                    '2Premio' => $this->input->post('2Premio'),
                    '3Premio' => $this->input->post('3Premio'),
                );

                $this->Torneo_model->update_torneo($id,$params);
                $data['Torneos'] = $this->Torneo_model->get_all_torneo();
                $this->load->view('Backoffice/Torneo/index',$data);
            }
            else
            {   
                $data['torneo'] = $this->Torneo_model->get_torneo($id);
                $data['Juegos'] = $this->Juego_model->get_all_juego();
                $this->load->view('torneo/edit',$data);
            }
        }
        else
            show_error('The torneo you are trying to edit does not exist.');
    } 

    function remove($id)
    {
        $torneo = $this->Torneo_model->get_torneo($id);

        if(isset($torneo['id']))
        {
            $this->Torneo_model->delete_torneo($id);
            $data['Torneos'] = $this->Torneo_model->get_all_torneo();
            $this->load->view('Backoffice/Torneo/index',$data);
        }
        else
            show_error('The torneo you are trying to delete does not exist.');
    }
}
