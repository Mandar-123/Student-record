<?php
  include 'dbh.inc.php';
  include_once 'checksession.inc.php';
  include_once 'checkIfFaculty.inc.php';
  $term=$_POST['i'];
  $sql = "SELECT rollNumber FROM interests WHERE otherinterests LIKE '%$term%'";
  $result=mysqli_query($conn,$sql);
  $str = '';
  if (mysqli_num_rows($result) > 0)
	{
			while($row = mysqli_fetch_assoc($result))
      {
        $roll = $row['rollNumber'];
        $query = "SELECT studentsName, gender FROM student WHERE rollNumber = '$roll';";
        $queryresult=mysqli_query($conn,$query);
        $row2 = mysqli_fetch_assoc($queryresult);
        $name = $row2['studentsName'];
        $gender = $row2['gender'];
        $fn = explode(' ', $name)[0];
        $ln = explode(' ', $name)[1];
        $str = $str."<div class='col-sm-2'>
          <div class='well profile' style='padding:5px;width:100%'>
            <div class='col-sm-12 text-center'>
              <img src='";
        if($gender == 'Male' || $gender == 'MALE' || $gender == 'male')
          $str = $str."Images/samplemale.jpg";
        else $str = $str."Images/samplefemale.jpg";
        $str = $str."' alt='' style='height:100%;width:100%;' class='img-circle img-responsive'>
            </div>
            <div class='col-sm-12' style='margin-top:10px'>
              <p style='text-align:center;'><b>".$fn."<br>".$ln."</b></p>
            </div>
            <div class='col-sm-12'>
              <p style='text-align:center;'><b>".$roll."</b></p>
            </div>
            <div class='col-sm-12'>
              <form action='student.php' target='_blank' method='POST'>
                <input type='hidden' value='".$roll."' name='uroll'>
                <button class='col-sm-8 col-sm-offset-2 col-sm-pull-2 btn btn-primary' type='submit' style='width:100%'>View</button>
              </form>
            </div>
          </div>
        </div>";
      }
      echo $str;
  }
?>
