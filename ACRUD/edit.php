<?php

include_once("db.php");


$description = $title ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST["id"])) {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $id = $_POST["id"];
        $insert= $c->prepare("UPDATE task SET title = :title, description = :description WHERE id = :id;");
        $insert->bindParam(':id', $id);
        $insert->bindParam(':title', $title);
        $insert->bindParam(':description', $description);
        $insert->execute();
            header("location: index.php");
            $success = "Post Modificato con successo";
        }
}
?>

<?php include_once("includes/header.php");?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form method="POST">
                        <input  name="id" type="hidden" value="<?php echo $_GET["id"]?>">
                    <div class="form-group">
                        <input  class="form-control" placeholder="Cambia il titolo" type="text" name="title" value="<?php echo $_GET["title"] ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Cambia il Testo" name="description" rows="2"> <?php echo $_GET["description"] ?></textarea>
                    </div>
                    <input class="btn btn-success w-100" type="submit"  name="update" value="Cambia">
                </form>
            </div>
        </div>
    </div>
</div>


<?php include_once("includes/footer.php"); ?> 

