<?php 

class Task {
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }
    
    public function getAllTasks(){
        $query = "SELECT * FROM tasks";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($name, $task, $priority, $image){
        try{
        $query = "INSERT INTO tasks(name, task, priority, image) VALUES (:name, :task, :priority, :image)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':task', $task);
        $stmt->bindParam(':priority', $priority);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    } catch (PDOException $e){
        echo "Error: " .$e->getMessage();
        return false;
    }
}

    public function deleteTask($id){
        $query = "DELETE FROM tasks WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function editTask($id, $name, $task, $priority, $image){
        $query = "UPDATE tasks SET name = :name, task = :task, priority = :priority, image = :image WHERE id  = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':task', $task);
        $stmt->bindParam(':priority', $priority);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

}

?>