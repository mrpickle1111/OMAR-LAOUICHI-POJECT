<?php
include 'connect.php';
if(isset($_POST['signUp'])){
    $Username = $_POST['username'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Password=md5($Password);
    $CHECK = "SELECT * FROM users WHERE username='$Username' OR email='$Email'";
    $RESULT=$CONN->query($CHECKEmail);
    if($RESULT->num_rows > 0){
        echo "<script>alert('Username or Email already exists!');</script>";
    } else {
        $INSERT = "INSERT INTO users (username, email, password) VALUES ('$Username', '$Email', '$Password')";
        if($CONN->query($insertQuery) === TRUE){
           header("Location: index.php");
        } else {
            echo "Error:" . $CONN->error;
        }
    }
}
if(isset($_POST['signIn'])){
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $Password = md5($Password);
    $sql= "SELECT * FROM users WHERE username='$Username' AND password='$Password'";
    $result = $CONN->query($sql);
    if($result->num_rows>0){
        session_start();
        $row= $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        header("Location: homepage.php");
        exit();
    } else {
        echo "Not found, please check your username and password.";
    }
}
 ?>