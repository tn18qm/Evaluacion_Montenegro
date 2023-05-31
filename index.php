<?php
include("connection.php");
$con = connection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <title>Terminal UNELLEZ</title>
<style>

        .logo{

            margin-top: 25px;
            margin-left: 350px;
            display: flex;
            padding: 25px;
           
        }
        .text{
            padding-left:25px;
        }
        
    </style>    
   
</head>

<header>
    
    
    <div class="logo">
        <img src="img/foto.jpg" alt="logo Fontur" align="left" width="140" height="140">

        <h3 class="text">Sistema web para el control de usuario del terminal<br/>
             terrestre de pasajeros «Humberto Hernández»<br/>
            Alcaldia del Municipio de San Fernando</h3>
          
    </div>
</header>
<body>
    
    <h3 align="left">Inicio</h3>
    <ul>
        <li align="left"><a href="paginas/contacto.html">Contacto</a></li>
    </ul> 
    <div class="users-form">
        <h1>Crear usuario</h1>
        <form action="insert_user.php" method="POST">
            <input type="text" name="name" placeholder="Nombre">
            <input type="text" name="lastname" placeholder="Apellidos">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="email" name="email" placeholder="Email">

            <input type="submit" value="Agregar">
        </form>
    </div>

    <div class="users-table"> 
        <h2>Usuarios registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['id'] ?></th>
                        <th><?= $row['name'] ?></th>
                        <th><?= $row['lastname'] ?></th>
                        <th><?= $row['username'] ?></th>
                        <th><?= $row['password'] ?></th>
                        <th><?= $row['email'] ?></th>
                        <th><a href="update.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="delete_user.php?id=<?= $row['id'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
<footer style= "text-align: left; background-color:#009688"><br>
    <h4>San Fernando de Apure, 11 de Mayo del 2023</h4>
</footer>
</html>