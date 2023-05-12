
<?php
include_once("db.php");

session_start();
$search ="";
$name = $last_name = $numero = $email = $password = $verifica_password = $result = "";

$name_error = $last_name_error = $numero_error = $email_error = $password_error = $verifica_passowrd_error = ""; 

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST["name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $numero = htmlspecialchars($_POST["numero"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $verifica_password = htmlspecialchars($_POST["verifica_password"]);
    if(empty($name)) $name_error = "Il campo obbligatorio";
    if(empty($last_name)) $last_name_error = "Il campo obbligatorio";
    if(empty($numero)) $numero_error = "Il campo obbligatorio";
    if(empty($email)) $email_error = "Il campo obbligatorio";
    if(empty($password)) $password_error = "Il campo obbligatorio";
    if(empty($verifica_password)) $verifica_passowrd_error = "Il campo obbligatorio";
    if ($password == $verifica_password) {
        echo  "la Password coincide";
    } else {
        echo "la password non coincide";
    };
    if(!$name_error && !$last_name_error && !$numero_error && !$email_error && !$password_error && !$verifica_passowrd_error ){
        $query = $c->prepare("INSERT INTO users (name, last_name, numero, email, password) VALUES (:name, :last_name, :numero, :email, :password)");
        $query->bindParam(':name', $name);
        $query->bindParam(':last_name', $last_name);
        $query->bindParam(':numero', $numero);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
        header("location: index.php");

    };
    

}; 
include_once("includes/header.php");
?>

<div class="container mt-5 p-4 card card-body d-flex text-center w-25">
    <form method="POST">
        <div class="form-group mb-2 has-validation">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" autofocus class="form-control" value="<?php echo $name ?>">
        <div class="invalid-feedback"><?php echo $name_error ?></div>
        </div>
        <div class="form-group mb-2 has-validation">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $last_name ?>">
        <div class="invalid-feedback"><?php echo $last_name_error ?></span>
        </div>
        <div class="form-group mb-2 has-validation">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo $email ?>">
        <div class="invalid-feedback"><?php echo $email_error ?></div>
        </div>
        <div class="form-group mb-2 has-validation">
            <label for="numero" class="form-label">Numero</label>
            <input type="number" name="numero" id="numero" autofocus class="form-control" value="<?php echo $numero ?>">
        <div class="invalid-feedback"><?php echo $numero_error ?></div>
        </div>
        <div class="form-group mb-2 has-validation">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" autofocus class="form-control" value="<?php echo $password ?>">
        <div class="invalid-feedback"><?php echo $password_error ?></div>
        </div>
        
        <div class="form-group mb-2 has-validation">
            <label for="verifica_password" class="form-label">Verifica Password</label>
            <input type="password" name="verifica_password" id="verifica_password" autofocus class="form-control" value="<?php echo $verifica_password ?>">
        <div class="invalid-feedback"><?php echo $verifica_passowrd_error ?></div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success mt-2 w-100" value="Registrati">
        </div>
    </form>
</div>