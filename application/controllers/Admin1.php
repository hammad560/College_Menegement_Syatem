<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin1 extends MY_Controller
{

    public function dashboard()
    {
        if ($this->session->userdata('id')) {
            $query['users'] = $this->quries->viewAllColleges();
            $this->load->view('dashboard', $query);
        } else {
            return redirect('admin/login');
        }
    }
    public function addCollege()
    {
       $role['roles'] = $this->quries->getRoles();
        $this->load->view('addCollege', $role);
    }
    public function createCollege()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('collegename', 'College Name', 'trim|required');
        $this->form_validation->set_rules('branch', 'Branch', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()) {
            $data = $this->input->post();
            if ($this->quries->makeCollege($data)) {
                $this->session->set_flashdata('message', 'College Created Successfully.!');
            } else {
                $this->session->set_flashdata('message', 'Failed to create College.!');
            }
            return redirect('admin1/dashboard');
        } else {
            $this->addCollege();
        }

    }
    public function addCoadmin()
    {
        $this->load->model('quries');

        $roles['roles'] = $this->quries->getRoles();
        $college['college'] = $this->quries->getCollege();

        // Load the view and pass data
        $data = array(
            'roles' => $roles['roles'],
            'college' => $college['college']
        );

        $this->load->view('addCoadmin', $data);
    }
    public function createCoadmin()
    {
        $this->validations();
        if ($this->form_validation->run()) {
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['gender'] = $this->input->post('gender');
            $data['role_id'] = $this->input->post('role_id');
            $data['college_id'] = $this->input->post('college_id');
            $data['password'] = sha1($this->input->post('password'));
            $data['cpassword'] = sha1($this->input->post('cpassword'));
            // call the model for insert the data and set the message on view also
            if ($this->quries->registerCoAdmin($data)) {
                $this->session->set_flashdata('message', 'COADMIN Registered Successfully!');
            } else {
                $this->session->set_flashdata('message', 'COADMIN Registeration failed !');
            }
            return redirect('admin1/dashboard');
        } else {

            $this->addCoadmin();
        }
    }
    public function addstudent()
    {
        $college['college'] = $this->quries->getCollege();
        $this->load->view('addStudent', $college);
    }
    public function createStudent()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('studentname', 'student name', 'trim|required');
        $this->form_validation->set_rules('college_id', 'college Name', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('course', 'course', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()) {
            $data['studentname'] = $this->input->post('studentname');
            $data['college_id'] = $this->input->post('college_id');
            $data['gender'] = $this->input->post('gender');
            $data['email'] = $this->input->post('email');
            $data['course'] = $this->input->post('course');
            if ($this->quries->addstudents($data)) {
                $this->session->set_flashdata('message', 'Student add successfully');
            } else {
                $this->session->set_flashdata('message', 'Student add failed');
            }
            redirect('admin1/addstudent');
        } else {
            $this->addstudent();
        }
    }
    public function validations()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'UserName', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('role_id', 'Role', 'trim|required');
        $this->form_validation->set_rules('college_id', 'Role', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
    }

    public function viewstudent($college_id)
    {
        $student['students'] = $this->quries->getStudents($college_id);
        $this->load->view('viewstudent', $student);
    }
    public function editStudent($id)
    {
        $studentdata['studentdata'] = $this->quries->getStudentRecord($id);
        $college['college'] = $this->quries->getCollege();
        $data = array(
            'studentdata' => $studentdata['studentdata'],
            'college' => $college['college']
        );
        $this->load->view('editstudent', $data);
    }
    public function modifyStudent($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('studentname', 'student name', 'trim|required');
        $this->form_validation->set_rules('college_id', 'college Name', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('course', 'course', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()) {
            $data['studentname'] = $this->input->post('studentname');
            $data['college_id'] = $this->input->post('college_id');
            $data['gender'] = $this->input->post('gender');
            $data['email'] = $this->input->post('email');
            $data['course'] = $this->input->post('course');                        
            if ($this->quries->updatestudents($data, $id)) {
                $this->session->set_flashdata('message', 'Student update successfully');
            } else {
                $this->session->set_flashdata('message', 'Student update failed');
            }
           redirect('admin1/viewstudent/'.$this->input->post('college_id'));
        } else {
            $this->editstudent();
        }
    }

    public function deleteStudent($id)
    {
        if ($this->quries->deleteStudentRecord($id)) {
            return redirect('admin1/dashboard');
        } else {
            echo "data not delete";
        }
    }
    public function coadmin(){
        $user['users'] = $this->quries->viewAllColleges();
        $this->load->view('viewcoadmin', $user);
    }


}
?>