<?php

class Aluno extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set(get_settings('timezone'));

        // Your own constructor code
        $this->load->model('akademia_model');
        $this->load->database();
        $this->load->library('session');
        // $this->load->library('stripe');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');


        // CHECK CUSTOM SESSION DATA
        $this->user_model->check_session_data();


        //CHECKING COURSE ACCESSIBILITY STATUS
        if (get_settings('course_accessibility') != 'publicly' && !$this->session->userdata('user_id')) {
            redirect(site_url('login'), 'refresh');
        }

        //If user was deleted
        if ($this->session->userdata('user_login') && $this->user_model->get_all_user($this->session->userdata('user_id'))->num_rows() == 0) {
            $this->user_model->session_destroy();
        }

        ini_set('memory_limit', '2024M');
    }

    public function index()
    {
        $this->home();
    }

    public function home()
    {
        $page_data['page_name'] = "home";
        $page_data['page_title'] = site_phrase('home');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

     public function iturma($idturma)
    {


        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        } 


            $turma = $this->akademia_model->buscar_turma($idturma);
            $idcurso = (int)$turma->row('curso');
            $curso = $this->akademia_model->buscar_curso($idcurso);
            $idunidade = (int)$turma->row('unidade');
            $unidade = $this->akademia_model->buscar_unidade($idunidade);

            $inscricao["id_turma"] = $idturma;
            $inscricao["id_curso"] =  $curso["id"];
            $inscricao["id_aluno"] = $this->session->userdata('user_id');

            if ($this->akademia_model->validar_aluno($inscricao["id_aluno"], $idturma)) {

                echo "Erro ao inserir dados!";
            } else {


                $this->akademia_model->inserir_inscricao($inscricao);
            }
        
    }

    public function inscricoes()
    {


        $user_id = $this->session->userdata('user_id');

        $page_data["inscricoes"] = $this->akademia_model->inscricoes($user_id)->row_array();

        var_dump($page_data["inscricoes"]);


       // $page_data['page_name'] = "minnha_turma";
       // $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);

        
    }
}
