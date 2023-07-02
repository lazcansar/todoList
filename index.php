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
  </head>
  <body>
    <section class="main-area">
      <div class="container">
        <h1 class="title-todo">Todo List App</h1>

        <div class="todo-form">
          <form action="" method="post">          
            <div class="input-group">
            <input type="text" class="form-control" name="task" placeholder="Task" aria-label="Task" aria-describedby="button-addon2">
            <button class="btn btn-warning" type="submit" name="taskAdd" id="button-addon2">Task Add</button>
            </div>
          </form>

        </div>
      </div>
    </section>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
