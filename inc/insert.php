
<?php
require_once 'dbCon.php';
    class insertTask {
        private $db;

        function __construct($db) {
            $this->db = $db;
        }
        public function insert($title, $important, $type, $date) {
            $stmt = "INSERT INTO task (taskTitle, taskImportant, taskType, taskCompleteDate) VALUES ('$title', '$important', '$type', '$date')";
            if($this->db->query($stmt) === TRUE) {
                echo "Data inserted successfully.";
            }
        }
    }
        $taskTitle = $_POST['task'];
        $taskImportant = $_POST['important'];
        $taskComplete = $_POST['taskCompleteDate'];
        $taskInsert = new insertTask($db);
        $taskInsert->insert("$taskTitle", "$taskImportant", "0", "$taskComplete");
?>