<?php
include('connect_db.php');
session_start();
if(isset($_POST['submit'])){
    $email_address = $_POST['email_address'];
    $pwd = md5($_POST['pwd']);
    $sql = "SELECT * FROM Users where email_address = '$email_address' and password = '$pwd';";
   $result = $conn->query($sql);
    echo $username;
        echo $email_address;
        echo $pwd;
if($result->num_rows>=0){
    while($row = $result->fetch_assoc()){
        $username = $row['fname'];
        $role = $row['role'];
        echo $username;
        $_SESSION['username'] = $username;
        echo $_SESSION['username'];
        echo '<script>
        window.location = "category.php";
        </script>';
        echo $username;
        echo $email_address;
        echo $pwd;
    }
   
}
else{
    echo '<script>
    alert("Incorrect Credentials")
    window.location = "category.php";
    </script>';
}

}

?>