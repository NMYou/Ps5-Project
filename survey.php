<?php
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page1.css">
    <style>
    .error {color: #FF0000;}
    .
    </style>    
</head>
<body>



<?php
// define variables and set to empty values
$nameErr = $departmentErr = $uidErr = $emailErr = $mobileErr = 
$addressErr = $genderErr = $dobErr = $batchErr = $jobErr = $studyErr = $achievementErr = $domainErr = $webinarErr = "";

$name = $department = $uid = $email = $mobile = 
$address = $gender = $dob = $batch = $job = $study = $achievement = $domain = $webinar = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["department"])) {
    $departmentErr = "Department is required";
  } else {
    $department = test_input($_POST["department"]);
  }

  if (empty($_POST["uid"])) {
    $uid = "";
  } else {
    $uid = test_input($_POST["uid"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["phone"])) {
    $mobileErr = " Mobile Number is required";
  } else {
    $mobile = test_input($_POST["phone"]);
  } 

  if (empty($_POST["address"])) {
    $address = "";
  } else {
    $address = test_input($_POST["address"]);
  }
    
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["dob"])) {
    $dobErr = "Date of birth is required";
  } else {
    $dob = test_input($_POST["dob"]);
  }

  if (empty($_POST["batch"])) {
    $batch = "";
  } else {
    $batch = test_input($_POST["batch"]);
  }

  if (empty($_POST["job"])) {
    $job = "";
  } else {
    $job = test_input($_POST["job"]);
  }

  if (empty($_POST["study"])) {
    $study = "";
  } else {
    $study = test_input($_POST["study"]);
  }

  if (empty($_POST["achievement"])) {
    $achievement = "";
  } else {
    $achievement = test_input($_POST["achievement"]);
  }

  if (empty($_POST["domain"])) {
    $domain = "";
  } else {
    $domain = test_input($_POST["domain"]);
  }

  if (empty($_POST["webinar"])) {
    $webinar = "";
  } else {
    $webinar = test_input($_POST["webinar"]);
  }
 
  if (empty($_POST["data"])) {
    header("Location: submit.php");
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



                  <!-- ------------------SURVEY FORM---------------------------- -->

<div id="outside">
<form id="survey-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <h1 id="title">Survey form for Alumni students</h1>
  <p><span class="error">* required field</span></p>
  <p id="description"><b>Note:</b> Form is to be completed by alumni students in due time.</p>
  
  <!-- ------------------Personal Details---------------------------- -->
  <fieldset>
    <!-- groups of widgets that share the same purpose, for styling and semantic purposes -->
    <legend>Personal Details</legend>
    <!-- formally describes the purpose of the fieldset it is included inside. -->
    <div>
      <label id="name-label" for="name">Full Name:</label>
      <input type="text" name="name" size= 30px placeholder="Enter name here" value="<?php echo $name;?>" required>
      <span class="error">* <?php echo $nameErr;?></span>
    </div>
    <div>
     <label for="department">Department:</label> 
      <select id="department" name="department" value="<?php echo $department;?>">
      <option value="select">--Please choose an option--</option>
      <option value="CMPN">CMPN</option>
      <option value="IT">IT</option>
      <option value="MECH">MECH</option>
      <option value="EXTC">EXTC</option>
      <option value="ELEX">ELEX</option>
      <option value="CIVIL">CIVIL</option>
      </select>
      <span class="error">* <?php echo $departmentErr;?></span>    
    </div>
    <div>
      <label id="uid-label" for="uid">UID:</label>
      <input type="text"  name="uid" size= 30px placeholder="Enter Your UID No." value="<?php echo $uid;?>" required>
      <span class="error">* <?php echo $uidErr;?></span>
      <span>(Ex:-18-ELEX04-22)</span>   
    </div>
    <div>
      <label id="email-label" for="Email">Email ID:</label>
      <input type="email" required id="email" name="email" size=30px placeholder="Enter email here" value="<?php echo $email;?>" required>
      <span class="error">* <?php echo $emailErr;?></span>  
    </div>
    <div>
      <label id="phone-label" for="phone">Contact No:</label>
      <input type="tel" name="phone" placeholder="Enter 10 digit number" pattern="[+91][0-9]{10,14}" value="<?php echo $mobile;?>" required>
      <span class="error">* <?php echo $mobileErr;?></span>
      <span>(Add +91)</span>  
    </div>
    <div>
      <label for="address-label">Residential Address:</label>
      <input type="text" id="address" name="address" size=70px placeholder="Enter address here" value="<?php echo $address;?>" required>  
    </div>  

    <!-- ------------------Radio Buttons-------------------------------- -->
    <div>
      <label for="gender">Gender</label>
      <p>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male<br>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female<br>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"> Other
        <span class="error">* <?php echo $genderErr;?></span>
      </p>
    </div>
    <div>
      <label for="date-label">Date of Birth:</label>
      <input type="date" name="dob" value="<?php echo $dob;?>">
      <span class="error">* <?php echo $dobErr;?></span> 
    </div>
    <div>
      <label for="batch-label">Passing Batch:</label>
      <input type="text" name="batch" placeholder="Ex:2016-17" value="<?php echo $batch;?>" required>  
      <span class="error">* <?php echo $batchErr;?></span>
    </div>
  </fieldset>
  <!-- --------------------Text Areas------------------------------ -->
  
  <fieldset>
    <legend>Higher Studies/Job Profile</legend>
    <div>
      <label for="msg"></label>
      <p>Specify Job Description or Higher Studies </p>
      <textarea id="msg" name="job" rows="2" cols="50" placeholder="Enter Text Here" required><?php echo $job;?>
      </textarea>
      <span class="error">* <?php echo $jobErr;?></span>   
    </div>
    <div>
      <label for="msg">Specify Post for job or Degree for higher studies</label><br>
      <textarea id="msg2" name="study" rows="2" cols="50" placeholder="Enter Text Here" required><?php echo $study;?>
      </textarea>  
      <span class="error">* <?php echo $studyErr;?></span> 
    </div>

  </fieldset>

    <!-- --------------------Survey Form------------------------------ -->

  <fieldset>
    <legend>Additional information</legend>
    <div>
      <label for="msg"></label>
      <p>Specify any Academic/Corporate/Extra-curricular achievement in recent years</p>
      <textarea id="msg" name="achievement" rows="2" cols="50" placeholder="Enter Text Here" required><?php echo $achievement;?>
      </textarea>  
    </div>
    <div>
      <label for="msg">Specify if any expertise in a technical or non-technical domain</label><br>
      <textarea id="msg2" name="domain" rows="2" cols="50" placeholder="Enter Text Here"><?php echo $domain;?>
      </textarea>   
    </div>
      <div>
      <label for="msg">Would you like to hold a seminar/webinar for our students?</label><br>
      <textarea id="msg2" name="webinar" rows="2" cols="50" placeholder="Enter Text Here"><?php echo $webinar;?>
      </textarea>    
    </div>
  </fieldset>

  <div id="submitbutton">
    <button type="submit" name="submit" value="Submit">Submit</button>   </div><br>

    
    <h6>Never submit passwords through forms.</h6>
</form>


    <!-- --------------------Contact Us------------------------------ -->

  <div id="outside">
    <form id="survey-form">
      <h5 style="color:blue;">Contact Us :-</h5>
      <h6><p style="color:#DAA520;">Thakur College Of Engineering And Technology.<br>
A-Block, Thakur Educational Campus, Shyamnarayan Thakur Marg,<br>Thakur Village, Kandivali(E). Mumbai - 400101.<br>
Tel: 022 - 28461891 / 022 - 67308000, 67308106 / 07<br>
Fax: 022 - 28461890<br>
E-Mail:  tcet@thakureducation.org<br>
Websites: www.tcetmumbai.in, www.thakureducation.org</p></h6>
  </div>


</div>

<?php


$query="INSERT INTO STUDENT VALUES ('$name','$department','$uid','$email','$mobile',
'$address','$gender','$dob','$batch','$job','$study','$achievement','$domain','$webinar')";
$data=mysqli_query($conn,$query);

if($data)
{
  //echo "Data inserted into Database";
}
else
{
  echo " Failed to insert Data into Database";

}
?>


</body>
</html>