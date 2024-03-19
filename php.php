<?php

$user = $_POST['username'];
$pass = $_POST['password'];

$conn = new mysqli('localhost:3306','root','','db1');

if($conn->connect_error){
    echo "conn->connect_error";
    die("Connection failed: ".$conn->connect_error);
}else{

 $sql = "select distinct * from `table1` where `username` = '$user' and `password` = '$pass'";
 $result = mysqli_query($conn, $sql);  
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 $count = mysqli_num_rows($result);  
     
if($count == 1 && $row['username'] === $user && $row['password'] === $pass){

header("Location:Main.php");
 echo "successful";

}else if($row['username']!=$user&& $row['password'] != $pass){
echo '<script>
alert("Login failed. Invalid username or password !");
window.location.href = "index.html";
         </script>';
}else if($row['username']=== null && $row['password'] === null){
echo '<script>
alert("Required Login To Admin!");
window.location.href = "index.html";
         </script>';
}else{  
   echo '<script>
alert("Error !");
window.location.href = "index.html";
         </script>';
        }   

    }





/*
if($conn->connect_error){
    echo "conn->connect_error";
    die("Connection failed: ".$conn->connect_error);
}else{
 $dtb = $conn->prepare("insert into `table2`(`username`,`password`)values(?,?)") ;
 $dtb->bind_param("ss",$user,$pass);
 $execval = $dtb->execute();

 
echo 'succesful';
}




$usr="Felje"; $ps="123abc";

if($user==$usr&&$pass==$ps){
   echo'<h1><script>
window.location.href = "index.html";
 alert("Log In Successfully  ;)");
          </script>';
}if($user==null&&$pass==$ps){
echo'<script>
window.location.href = "index.html";
alert("No Username!");
         </script>';
}if($user==$usr&&$pass==null){
echo'<script>
window.location.href = "index.html";
alert("No Password!");
         </script>';
}if($user==null&&$pass==null){
echo'<script>
window.location.href = "index.html";
alert("No Username! & Password!");
         </script>';
}if($user!=$usr&&$pass==null){
echo'<script>
window.location.href = "index.html";
alert("Wrong Username! & No Password!");
         </script>';
}if($user==null&&$pass!=$ps){
echo'<script>
window.location.href = "index.html";
alert("No Username! & Wrong Password!");
         </script>';
}else if($user==$usr&&$pass!=$ps){
echo'<script>
window.location.href = "index.html";
alert("Wrong Password!");
         </script>';
}else if($user!=$usr&&$pass==$ps){
echo'<script>
window.location.href = "index.html";
alert("Wrong Username!");
         </script>';
}else if($user!=$usr&&$pass!=$ps){
echo'<script>
window.location.href = "index.html";
alert("Wrong Username! & Password!");
         </script>';
}else{
    echo'<script>
window.location.href = "index.html";
alert("Invalid!");
         </script>';
}

*/

?>




