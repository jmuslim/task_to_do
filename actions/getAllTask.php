<?php 
include 'config.php';
include 'tasks.php';

$database = new Database();
$db = $database->connect();
$task = new Task($db);

$result = $task->getAllTasks();

if($result){
    echo json_encode($result);
}else{
    echo json_encode(['message' => 'No task found.']);
}
exit;
?>