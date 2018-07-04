<?php
  if(isset($_SESSION['id']))
  {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM faculty WHERE id = '$id';";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) <= 0)
    {
      header("Location: /WebProjects/Student-record/studentHome.php");
      exit();
    }
  }
?>
