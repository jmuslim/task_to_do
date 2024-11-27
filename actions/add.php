<?php 
include 'config.php';
include 'tasks.php';

$database = new Database();
$db = $database->connect();
$task = new Task($db);

//Checking require fields are present in POST request.
if(isset($_POST['name'], $_POST['task'], $_POST['priority'], $_POST['image'])){
    echo json_encode(['message' => 'Required fields need fill.']);
    exit();
}

    $name = $_POST['name'];
    $taskDetails = $_POST['task'];
    $priority = $_POST['priority'];
    $image = $_POST['image'];

    //Data validation
    if(empty($name) || empty($taskDetails) || empty($priority) || empty($image)){
        echo json_encode(['message' => 'Required fields need fill.']);
        exit();
    }


if($task->addTask($name, $taskDetails, $priority, $image)){
    echo json_encode(['message' => 'Task added successfully']);
}else{
    echo json_encode(['message' => 'Failed to add the task']);
}
?>