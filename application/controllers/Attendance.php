<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta");
class Attendance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form', 'universal']);
        $this->load->library(['form_validation', 'session', 'pagination']);
        $this->load->model(['common', 'attendance_model']);
    }
    public function index()
    {
        $user = isAdmin();
        // $this->data['user']=$user;
        //    $adminId = $user->user_id;

        $query = "";
        $keyword = $this->input->get('keyword');
        if (!empty($keyword)) {
            $query = "?keyword=" . $keyword;
        }
        $group_id = $this->input->get('group_id');
        if (!empty($group_id)) {
            $query = "&group_id=" . $group_id;
        }

        $config = getPagination();
        $config["per_page"]=50;
        $config['base_url'] = site_url("attendance" . $query);
        $config['total_rows'] = $this->attendance_model->UserCount($keyword, $user->user_id);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page'] - 1) * $config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['users'] = $this->attendance_model->UserData($config["per_page"], $page, $keyword, $user->user_id);
        // echo "<pre>"; print_r($this->data['users']); die;
        // $this->data['adminId']=$adminId;
        $this->data['content'] = 'attendance/index';
        $this->load->view('admintemplate', $this->data);
    }

    public function editAttendence()
    {
        $user = isAdmin();
        $added_by = $user->user_id;
        // $olddate=date("Y-m-d", strtotime("- 1 day"));
        $emp_id = $this->input->post("emp_id");
        $id = $this->input->post("id");
        $status = trim($this->input->post("status"));
        $current_date = date("Y-m-d");
        $attendence = $this->common->record('emp_attendance', ['emp_id' => $emp_id, "attend_date" => $current_date]);

        if (empty($attendence)) 
        {
            $this->common->save("emp_attendance", ['added_by' => $added_by, 'emp_id' => $emp_id, "attend_date" => $current_date, "attend_status" => $status]);
            echo json_encode(['status' => "added"]);
        } elseif ($user->user_id == "1" || $user->user_id == "377") {
            $this->common->update("emp_attendance", ["attend_status" => $status, "added_by" => $added_by], ['id' => $id]);
            echo json_encode(['status' => "update"]);
        }
    }

    public function EmployeeAttendence($id = "")
    {
        $user = isAdmin();
        if (empty($id)) {
            $id = $user->user_id;
        }
        $query = "";
        $month = $this->input->get('month');
        $year = $this->input->get('year');
        if (!empty($month)) {
            $query = "?month=" . $month;
        }
        if (!empty($year)) {
            $query = "?year=" . $year;
        }
        $config = getPagination();
        $config["per_page"]=50;
        $config['base_url'] = site_url("attendance/EmployeeAttendence/" . $id . $query);
        $config['total_rows'] = $this->attendance_model->AttendanceCount($month, $year, $id);
        $this->pagination->initialize($config);
        $page = isset($_GET['per_page']) ? ($_GET['per_page'] - 1) * $config["per_page"] : 0;
        $this->data['pagination'] = $this->pagination->create_links();

        $this->data['employeeAttendence'] = $this->attendance_model->EmployeeAttendent($config["per_page"], $page, $month, $year, $id);

        //  echo "<pre>"; print_r($this->data['employeeAttendence']); die;
        $this->data['user_id'] = $user->user_id;
        $this->data['id'] = $id;
        $this->data['title'] = 'Attendance';
        $this->data['content'] = 'attendance/employee_attendance';
        $this->load->view('admintemplate', $this->data);
    }
    
    public function empCal($id = "")
    {
         $user = isAdmin();
         $this->data['employee'] =  $this->common->record("users",['id'=>$id]);
        if (empty($id)) {
            $id = $user->user_id;
        }
        
        
        $month = $this->input->get('month');
        $year = $this->input->get('year');
        
       
        // echo '<pre>'; print_r($EmployeeNames); die;
        $attendances = $this->attendance_model->MonthlyAttendance($month, $year, $id);
        $current_month=date("Y-m-d");
    
        if(!empty( $month) && !empty($year )){
             $current_month=$year.'-'.$month."-01"; 
        }
        
        
        require_once APPPATH.'third_party/Calendar.php';
        $calendar = new Calendar($current_month);
        if(!empty($attendances )){
            foreach ( $attendances as $row){
               // echo '<pre>'; print_r($row); die;
                 $attendence=$row->attend_status;
                    if($attendence=="present"){
                       $color="green";
                    }
                    if($attendence=="absent"){
                        $color="red";
                        
                    }
                    
                    if($attendence=="half day"){
                         $color="orange";
                    }
                    
                    if($attendence=="week-off"){
                         $color="blue";
                    }
                    
                    if($attendence=="leave"){
                         $color="blue";
                    }
                    if($attendence=="holiday"){
                         $color="blue";
                    }
                    if($attendence=="comp-off"){
                         $color="green";
                    }
                 $calendar->add_event(ucfirst($row->attend_status)."<br> Updated By <br>".ucfirst($row->first_name), $row->attend_date, 1,  $color);
            }
            
        }
       // $calendar->add_event('Present', '2021-07-03', 1, 'green');
       // $calendar->add_event('Absent', '2021-07-04', 1, 'red');
       // $calendar->add_event('Holiday', '2021-07-16', 1,'blue');
        
        
        
        $this->data['calendar'] =  $calendar;    
        
        $this->data['user_id'] = $user->user_id;
        $this->data['id'] = $id;
        $this->data['title'] = 'Attendance';
        $this->data['content'] = 'attendance/attendance_calendar';
        $this->load->view('admintemplate', $this->data);
        
        
       
    }

    public function createExcel($id)
    {
        $fileName = "";
        $filename = 'users_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
        $employeeAttendence = $this->attendance_model->employeeList($id);
        //echo "<pre>"; print_r($employeeAttendence); die;
        $file = fopen('php://output', 'w');
        $header = ["Id", "Date", "Time", "Status"];
        fputcsv($file, $header);
        foreach ($employeeAttendence->result_array() as $key => $value) {
            fputcsv($file, $value);
        }
        fclose($file);
        exit();
    }

    public function GetUser($keyword = "", $user_id = "")
    {
        $user = isAdmin();
        $this->data['user'] = $user;

        $fileName = "";
        $filename = 'users_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        $UserAttendence = $this->attendance_model->GetUserData($keyword, $user->user_id);
        // echo "<pre>"; print_r($UserAttendence); die;
        $file = fopen('php://output', 'w');
        $header = ["Id", "First Name", "Last Name", "Phone", "Email", "Status", "CREATED"];
        fputcsv($file, $header);
        foreach ($UserAttendence->result_array() as $key => $row) {
            fputcsv($file, $row);
        }
        fclose($file);
        exit();
    }

    public function AddEmployeeAttendance($emp_id)
    {
        $user = isAdmin();
        if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $this->form_validation->set_rules('attend_status', 'Status', 'required');
            $this->form_validation->set_rules('attend_date', 'Date', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

            if ($this->form_validation->run() == false)
            {
                
            } else {
                
                $save['added_by'] = $user->user_id;
                $save['emp_id'] = $emp_id;
                $save['attend_status'] = $this->input->post("attend_status");
                $save['attend_date'] = date("Y-m-d", strtotime($this->input->post("attend_date")));

                $attendence = $this->common->record('emp_attendance', [ 'emp_id' => $emp_id, "attend_date" => $save['attend_date'] ]);
                if($attendence){
                  //  echo "Update"; die;
                    $this->common->update("emp_attendance", $save, [ 'emp_id' => $emp_id, "attend_date" => $save['attend_date'] ]);
                }else{
                   //  echo "Add"; die;
                     $this->common->save("emp_attendance", $save);
                }

               
                //echo "<pre>"; print_r($save); die;
                redirect('attendance/empCal/' . $emp_id);
            }
        }

        $this->data['id'] = $emp_id;
        $this->data['title'] = 'Attendance';
        $this->data['content'] = 'attendance/add_employee_attendance';
        $this->load->view('admintemplate', $this->data);
    }
}
