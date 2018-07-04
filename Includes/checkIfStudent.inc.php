<?php
  if(isset($_SESSION['id']))
  {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM student WHERE rollNumber = '$id';";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) <= 0)
    {
      header("Location: /WebProjects/Student-record/home.php");
      exit();
    }
  }
?>
