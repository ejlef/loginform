<?php
$user = $_POST['username'];
$pass = $_POST['password'];
$id = $_POST['id'];

$conn = new mysqli('localhost','root','','database');

$sql = "select distinct * from `table1` where `username` = '$user' and `password` = '$pass' and `Id` = '$id'";

 $result = mysqli_query($conn, $sql);  
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 $count = mysqli_num_rows($result);  

if($conn->connect_error){
    echo "conn->connect_error";
    die("Connection failed: ".$conn->connect_error);
}
else{
 $dtb = $conn->prepare("insert into `table1`(`username`,`password`,`id`)values(?,?,?)") ;
 $dtb->bind_param("sss",$user,$pass,$id);
 $execval = $dtb->execute();

 
echo '<script>alert("Successful!");
window.location.href = "index.html";
</script>';

}

?>
