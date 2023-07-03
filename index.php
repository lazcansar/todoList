<?php 
require_once './inc/dbCon.php';
?>
<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="stil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body>
<?php 
if(isset($_POST['taskAdd'])) {
  $title = $_POST['task'];
  $important = $_POST['important'];
  $date = $_POST['taskCompleteDate'];
  $status = false;
  $stmt = $db->prepare("INSERT INTO task (taskTitle, taskImportant, taskType, taskCompleteDate) VALUES (?,?,?,?)");
  $stmt->bind_param("ssss", $title, $important, $status, $date);
  $stmt->execute();

}
?>

    <section class="main-area">
      <div class="container">
        <h1 class="title-todo">Todo List App</h1>
        <div class="todo-form">
          <form id="taskInsert" action="" method="POST">          
            <div class="input-group">
            <input type="text" class="form-control" name="task" placeholder="Task">
            <select class="form-select" name="important">
              <option selected>Task Important?</option>
              <option value="Urgent">Urgent!</option>
              <option value="Normal">Normal</option>
            </select>
            <input type="date" name="taskCompleteDate" class="form-control">
            <button class="btn btn-warning" type="submit" name="taskAdd">Task Add</button>
            </div>
          </form>
        </div>
<span id="sonuc"></span>
        <table class="table mt-5">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Job Title</th>
            <th scope="col">Importance Level</th>
            <th scope="col">Complete Date</th>
            <th class="text-center" scope="col">Complete</th>
            <th class="text-center" scope="col">Delete</th>
          </tr>
          </thead>
          <tbody>
            <?php 
            $stmt = $db->prepare("SELECT * FROM task ORDER BY taskId DESC");
            $stmt->execute();
            $result = $stmt->get_result();
            $countList = mysqli_num_rows($result);
            $x = 1;
            while($listTask = $result->fetch_array()) {
              $id = $listTask['taskId'];
              $title = $listTask['taskTitle'];
              $status = $listTask['taskImportant'];
              $date = $listTask['taskCompleteDate'];
              $type = $listTask['taskType'];
              if($status == "Urgent") {
                $color = 'class="bg-warning"';
                $colorClass = "bg-warning";
                $dangerIcon = '<i class="bi bi-exclamation-octagon-fill"></i> ';
              }else {
                $color = '';
                $colorClass = '';
                $dangerIcon = '';
              }
              if($type == "checked") {
                echo '
                <tr>
                <th class="text-black-50" scope="row"><del>'.$x.'</del></th>
                <td class="text-black-50"><del>'.$title.'</del></td>
                <td class="text-black-50"><del>'.$status.'</del></td>
                <td class="text-black-50"><del>'.$date.'</del></td>
                <td class="text-center"><form action="./inc/update.php" method="post"><input type="hidden" value="'.$id.'" name="taskId"><input type="hidden" value="empty" name="check"><button type="submit" class="btn btn-sm btn-success" name="check"><i class="bi bi-check2-circle"></i> Checked</button></form></td>
                <td class="text-center"><a class="text-danger" href="./inc/delete.php?taskId='.$id.'"><i class="bi bi-x-lg"></i></a></td>
                </tr>
              ';
              }else {
              echo '
                <tr">
                <th '.$color.' scope="row">'.$x.'</th>
                <td '.$color.'>'.$title.'</td>
                <td '.$color.'>'.$dangerIcon.$status.'</td>
                <td '.$color.'>'.$date.'</td>
                <td class="text-center '.$colorClass.'"><form action="./inc/update.php" method="post"><input type="hidden" value="'.$id.'" name="taskId"><input type="hidden" value="checked" name="check"><button type="submit" class="btn btn-sm btn-primary" name="checked">Check</button></form></td>
                <td class="text-center '.$colorClass.'"><a class="text-danger" href="./inc/delete.php?taskId='.$id.'"><i class="bi bi-x-lg"></i></a></td>
                </tr>
              ';
            }
              $x++;
            }
            ?>
          </tbody>
        </table>


        <p class="text-center text-capitalize text-info border-5 border-top border-bottom pt-4 pb-4 mt-5">Total : <?php echo $countList; ?> </p>
      </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
