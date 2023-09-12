<?php
class Quries extends CI_Model{
    public function getRoles(){
        $roles = $this->db->get('tbl_roles');
        if( $roles->num_rows() > 0 ){
            return $roles->result();
        }
    }
    public function getCollege(){
        $college = $this->db->get('tbl_college');
        if( $college->num_rows() > 0 ){
            return $college->result();
        }
    }
    public function registerAdmin($data){
       return $this->db->insert('tbl_user', $data);        
    }
    public function checkAdminExit() {
        $checkAdmin = $this->db->where(['role_id' => 1])->get('tbl_user');
        return $checkAdmin->num_rows();
    }    
    public function adminExit($email, $password){
        $checkAdmin = $this->db->where(['email'=>$email , 'password'=> $password])->get('tbl_user');
        if($checkAdmin->num_rows() > 0){
            return $checkAdmin->row();
        }
    }
    public function makeCollege($data){
        return $this->db->insert('tbl_college', $data);      
    }

    public function registerCoAdmin($data){
        return $this->db->insert('tbl_user', $data);
    }    
    public function viewAllColleges(){
        $this->db->select(['u1.user_id','u1.college_id', 'u1.email' ,'u1.role_id','u1.username', 'u1.gender',
        'c.collegename','c.branch', 'r.name']);
        $this->db->from('tbl_college as c');
        $this->db->join('tbl_user as u1', 'u1.college_id = c.college_id');
        $this->db->join('tbl_roles as r', 'u1.role_id = r.id');
        $user = $this->db->get();
        return $user->result();
    }
    public function addstudents($data){
        return $this->db->insert('tbl_student', $data);
    }
    public function getStudents($college_id){
        $this->db->select(['tbl_student.id','tbl_college.collegename','tbl_student.studentname', 'tbl_student.email', 
        'tbl_student.gender','tbl_student.course']);        
        $this->db->from('tbl_student');
        $this->db->join('tbl_college', 'tbl_college.college_id = tbl_student.college_id');
        $this->db->where(['tbl_student.college_id'=>$college_id]);
        $students = $this->db->get();
        return $students->result();
    }
    public function getStudentRecord($id){
        $this->db->select(['tbl_student.id','tbl_college.college_id', 'tbl_college.collegename','tbl_student.gender',
        'tbl_student.email','tbl_student.studentname', 'tbl_student.course']);
        $this->db->from('tbl_student');
        $this->db->join('tbl_college', 'tbl_college.college_id = tbl_student.college_id ');
        $this->db->where(['tbl_student.id'=>$id]);
        $student = $this->db->get();
        return $student->row();
    }
    public function updatestudents($data, $id){
        $this->db->where('id', $id);
        return $this->db->update('tbl_student', $data);
    }
    public function deleteStudentRecord($id){
       return $this->db->DELETE('tbl_student',['id'=> $id]); 
    }
}
?>