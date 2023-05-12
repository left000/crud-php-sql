<?php

include_once("db.php"); 
include_once("save_task.php");
include_once("delete_task.php");
include_once("search.php");


$query = $c->prepare("SELECT * FROM task ORDER BY created_at DESC ");
$query->execute();




include_once("includes/header.php");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder = "Task title" autofocus>
                        <p class="text-danger"> <?php echo $title_error?></p>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                        <p class="text-danger"> <?php echo $description_error?></p>
                    </div>
                    <button  type="submit" class="btn btn-success w-100" name="save_task">Save Task</button>
                    <!-- <input type="submit" class="btn btn-success w-100" name="save_task" value="Save Task">  -->
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($query as $row) { ?>
                    <tr>
                        <td><?php echo $row["title"]?></td>
                        <td><?php echo $row["description"]?></td>
                        <td><?php echo date('d/M/Y', strtotime($row["created_at"]))?></td>
                        
                        <td>
                        <a  class="btn btn-secondary" href="edit.php?id=<?php echo $row["id"]?>&title=<?php echo $row["title"]?>&description=<?php echo $row["description"]?>"> <i class="fas fa-marker"></i></a>
                        <a  class="btn btn-danger" href="delete_task.php?id=<?php echo $row["id"]?>"> <i class="fas fa-trash"></i></a>
                        </td>
                        
                    </tr>
                    <?php } ?>
                </tbody>


            </table>
        </div>
    </div>
</div>







<?php
include_once("includes/footer.php"); 
?>
