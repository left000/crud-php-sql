<?php

include_once("db.php");
include_once("search.php");

$page = "login";       // Identificatore univoco della pagina 
$html_title = "Login"; // Titolo della pagina

$email = $password = $email_error = $password_error = "";

if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true){
    header("location: index.php");
}else{
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);
            
            if(empty($email)) $email_error = "Campo obbligatorio";
            if(empty($password)) $password_error = "Campo obbligatorio";

            $query = $c->prepare("SELECT * FROM users WHERE email = :email");
            $query->bindParam(":email", $email);
            $query->execute();

            $result = $query->fetch();
            if($result) {
                if(password_verify($password, $result["password"])) {
                $_SESSION["logged"] = true;
                $_SESSION["name"] = $result["name"];
                $_SESSION["id"] = $result["id"];
                $_SESSION["email"] = $result["email"];
                // $_SESSION["admin"] = $result["admin"];
                header("location: index.php");
                } else $password_error = "Password errata";
            } else $email_error = "Email errata.";
    }
}


include_once("includes/header.php");
?>


<div class="container mt-5 p-4 card card-body d-flex text-center w-25">
    <form method="POST">
        <div class="form-group mb-2 has-validation">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" autofocus class="form-control <?php if($email_error) echo "is-invalid" ?>" value="<?php echo $email ?>">
        <div class="invalid-feedback"><?php echo $email_error ?></div>
        </div>
        <div class="form-group mb-2 has-validation">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control <?php if($password_error) echo "is-invalid" ?>" value="<?php echo $password ?>">
        <div class="invalid-feedback"><?php echo $password_error ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success mt-2 w-100" value="Login">
        </div>
    </form>
</div>