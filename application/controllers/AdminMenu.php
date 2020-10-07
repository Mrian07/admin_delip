<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminMenu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        // $this->load->model('Appsettings_model', 'app');
        $this->load->model('Users_model', 'user');
        $this->load->model('AdminModel', 'admin');
        $this->load->model('Pelanggan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['admin'] = $this->admin->getAllAdmin();
        // var_dump($data['user']);die;
        // $data['transaksi']= $this->dashboard->getAlltransaksi();
        // $data['fitur']= $this->dashboard->getAllfitur();
        $this->load->view('includes/header');
        $this->load->view('admin/index', $data);
        $this->load->view('includes/footer');
    }


    public function block($id)
    {
        $this->user->blockusersById($id);
        $this->session->set_flashdata('block', 'blocked');
        redirect('users');
    }

    public function unblock($id)
    {
        $this->user->unblockusersById($id);
        $this->session->set_flashdata('block', 'unblock');
        redirect('users');
    }
    public function UbahAdmin($id)
    {
        $this->admin->ubahKeAdmin($id);
        redirect('AdminMenu');
    }

    public function userunblock($id)
    {
        $this->user->unblockuserbyid($id);
        redirect('users');
    }

    public function tambah()
    {
        // var_dump($_POST);die;

        $password = html_escape($this->input->post('password', TRUE));
        $email = html_escape($this->input->post('email', TRUE));
        $statusAdmin = html_escape($this->input->post('statusAdmin', TRUE));
        $fullnama = html_escape($this->input->post('fullnama', TRUE));

        $this->form_validation->set_rules('fullnama', 'NAME', 'trim|prep_for_form');


        $this->form_validation->set_rules('email', 'EMAIL', 'trim|prep_for_form|is_unique[pelanggan.email]');
        
        $this->form_validation->set_rules('password', 'PASSWORD', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {

            $config['upload_path']     = './images/admin/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']         = '100000';
            $config['file_name']     = 'name';
            $config['encrypt_name']     = true;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('fotopelanggan')) {

                $foto = html_escape($this->upload->data('file_name'));
            } else {
                $foto = 'noimage.jpg';
            }


            $data             = [

                'image'             => $foto,
                'user_name'                  => html_escape($this->input->post('fullnama', TRUE)),

                'email'                     => html_escape($this->input->post('email', TRUE)),

                'admin_role'                     => html_escape($this->input->post('statusAdmin', TRUE)),

                'password'                  => sha1($password),

            ];
            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('users/index');
            } else {

                $this->admin->tambahdataadmin($data);
                $this->session->set_flashdata('tambah', 'User Has Been Added');
                redirect('AdminMenu/index');
            }
        } else {
            $this->load->view('includes/header');
            $this->load->view('Admin/tambahadmin');
            $this->load->view('includes/footer');
            // }
        }
    }

    
    
    // BARUUU
    
    public function hapusAdmin($id)
    {
        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect('users/index');
        } else {
            $data = $this->admin->getAdminByID($id);
            // var_dump($data['image']);die;
            $gambar = $data['image'];
            unlink('images/admin/' . $gambar);

            $this->admin->hapusAdminByID($id);

            $this->session->set_flashdata('hapus', 'Admin Has Been Deleted');
            redirect('AdminMenu/index');
        }
    }
      public function ubahSuper($id)
    {
        $this->admin->ubahKeSuperAdmin($id);
        redirect('AdminMenu');
    }
    
    public function detail($id)
    {
        $data = $this->user->getcurrency();

        $data['admin'] = $this->admin->getAdminByID($id);

        // $data['fitur']= $this->dashboard->getAllfitur();
        $this->load->view('includes/header');
        $this->load->view('Admin/detailusers', $data);
        $this->load->view('includes/footer');
    }
     public function ubahid()
    {
        // var_dump($_POST);die;

        $this->form_validation->set_rules('fullnama', 'fullnama', 'trim|prep_for_form');

        $this->form_validation->set_rules('no_telepon', 'no_telepon', 'trim|prep_for_form');

        $this->form_validation->set_rules('email', 'email', 'trim|prep_for_form');

        $id = html_escape($this->input->post('id', TRUE));

        if ($this->form_validation->run() == TRUE) {
            $data             = [
                'user_name'                     => html_escape($this->input->post('user_name', TRUE)),
                
                'id'                        => html_escape($this->input->post('id', TRUE)),

                'admin_role'                    => html_escape($this->input->post('admin_role', TRUE)),
                
                'email'                        => html_escape($this->input->post('email', TRUE)),

                 'nama'                        => html_escape($this->input->post('nama', TRUE)),

                  'wilayah'                        => html_escape($this->input->post('wilayah', TRUE)),

                   'no_telepon'                        => html_escape($this->input->post('no_telepon', TRUE))
            ];


            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('users/detail/' . $id);
            } else {
                $this->admin->ubahAdminByID($data);
                $this->session->set_flashdata('ubah', 'User Has Been Change');
                redirect('AdminMenu/detail/' . $id);
            }
        } else {

            $data = $this->user->getcurrency();
            $data['user'] = $this->user->getusersbyid($id);
            $data['countorder'] = $this->user->countorder($id);
            // $data['transaksi']= $this->dashboard->getAlltransaksi();
            // $data['fitur']= $this->dashboard->getAllfitur();
            $this->load->view('includes/header');
            $this->load->view('users/detailusers', $data);
            $this->load->view('includes/footer');
        }
    }
     public function ubahfoto()
    {

        $config['upload_path']     = './images/admin/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']         = '100000';
        $config['file_name']     = 'name';
        $config['encrypt_name']     = true;
        $this->load->library('upload', $config);
        $id = $id = html_escape($this->input->post('id', TRUE));
        $data = $this->admin->getAdminByID($id);

        if ($this->upload->do_upload('image')) {
            if ($data['image'] != 'noimage.jpg') {
                $gambar = $data['image'];
                unlink('images/admin/' . $gambar);
            }

            $foto = html_escape($this->upload->data('file_name'));

            $data = [
                'image'       => $foto,
                'id'        => html_escape($this->input->post('id', TRUE))
            ];

            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('AdminMenu/detail/' . $id);
            } else {
                $this->admin->ubahdatafoto($data);
                $this->session->set_flashdata('ubah', 'Admin Has Been Change');
                redirect('AdminMenu/detail/' . $id);
            }
        } else {

            $data = $this->user->getcurrency();
            $data['user'] = $this->user->getusersbyid($id);
            $data['countorder'] = $this->user->countorder($id);
            // $data['transaksi']= $this->dashboard->getAlltransaksi();
            // $data['fitur']= $this->dashboard->getAllfitur();
            $this->load->view('includes/header');
            $this->load->view('users/detailusers', $data);
            $this->load->view('includes/footer');
        }
    }   
     public function ubahpass()
    {

        $this->form_validation->set_rules('password', 'password', 'trim|prep_for_form');

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $data = $this->input->post('password');
            $dataencrypt = sha1($data);

            $data             = [
                'id'            => html_escape($this->input->post('id', TRUE)),
                'password'      => $dataencrypt
            ];

            if (demo == TRUE) {
                $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
                redirect('AdminMenu/detail/' . $id);
            } else {
                $this->admin->ubahdatapassword($data);
                $this->session->set_flashdata('ubah', 'Admin Has Been Change');
                redirect('AdminMenu/detail/' . $id);
            }
        } else {
                redirect('AdminMenu');
        }
    }
}
