<?php

use models\StudentDB;

include(__DIR__.'/../../Models/site/StudentDB.php');

class Student{

    public function __construct()
    {
        $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? 'list';
        switch ($action) {
            case 'list':
                $this->list();
                break;
            case 'deleteSoft':
                $this->softDeleteStudent();
                break;
            default:
                echo 'Method Invalid';
                break;
        }
    }

    //Danh sách student
    public function list () {
        // gọi biến page_number kiểm tra có tồn tài $_GET['page'] nếu có thì hiện thị không thì chỉ hiển thị bằng 1
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // số lượng giá trị sẽ hiện thị trong 1 bảng
        $items_per_page = 10;

        $result = StudentDB::get_student_page($page_number, $items_per_page);

        $list_students = $result['students'];
        $total_pages = $result['total_pages'];
        include(__DIR__ . '/../../Views/site/student/list_student.php');
    }
    //Xóa cứng đối tượng student
    /*public function delete () {
        $id = filter_input(INPUT_GET, 'id');
        StudentDB::deleteStudent($id);
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $items_per_page = 10;

        $result = StudentDB::get_student_page($page_number, $items_per_page);

        $list_students = $result['students'];s
        $total_pages = $result['total_pages'];
        include(__DIR__ . '/../../views/site/student/list_student.php');
    }*/

    //Xóa mềm đối tượng student
    public function softDeleteStudent () {
        $id = filter_input(INPUT_GET, 'id');
        StudentDB::softDeleteStudent($id);
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $items_per_page = 10;

        $result = StudentDB::get_student_page($page_number, $items_per_page);

        $list_students = $result['students'];
        $total_pages = $result['total_pages'];
        include(__DIR__ . '/../../views/site/student/list_student.php');
    }
}
