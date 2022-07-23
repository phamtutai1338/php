<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow_Methods: POST");
header("Access_Control_Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,
     Authorization, X-Requested-With");
include_once  'database.php';
include_once  'employees.php';
$database = new Database();
$db = $database->getConnection();
$item = new Employee($db);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingEmployee();
if($item->name != null){
    $emp_arr = array(
        "id" => $item->id,
        "name" => $item->name,
        "email" => $item->email,
        "age" => $item->age,
        "designation" => $item->designation,
        "created" => $item->created
    );
    http_response_code(200);
    echo json_encode($emp_arr);
}

else{
    http_response_code(404);
    echo json_encode("Employee not found.");
}
?>
