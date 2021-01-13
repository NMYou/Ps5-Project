<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page1.css">
    <title>Display records of alumni student detail</title>
    <style>
        body {
 background-image: url("https://image.shutterstock.com/image-photo/light-color-abstract-background-created-260nw-1564029013.jpg");
 background-repeat: no-repeat;
 background-size: 100%;
}
h1 {
  font-size: 12px;
}
</style>    
</head>
<body>
<h2><b>Records of Alumni Student Information</b></h2>
<h1>
<table border="1">   
<tr>
<th>Name</th>
<th>Department</th>
<th>UIDNo.</th>
<th>E-mail</th>
<th>Mobile Number</th>
<th>Address</th>
<th>Gender</th>
<th>Date-of-Birth</th>
<th>Batch</th>
<th>Job Description</th>
<th>Post for job</th>
<th>Achievement</th>
<th>Domain</th>
<th>Seminar/Webinar</th>
</tr>
<?php
error_reporting(0);
include("connection.php");
$query = "SELECT * FROM STUDENT";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total!=0){

    
    while(($result=mysqli_fetch_assoc($data)))
    {
        echo "
        <tr>
        <td>".$result['name']."</td>
        <td>".$result['department']."</td>
        <td>".$result['uid']."</td>
        <td>".$result['email']."</td>
        <td>".$result['mobileno']."</td>
        <td>".$result['address']."</td>
        <td>".$result['gender']."</td>
        <td>".$result['dateofbirth']."</td>
        <td>".$result['batch']."</td>
        <td>".$result['job']."</td>
        <td>".$result['study']."</td>
        <td>".$result['achievement']."</td>
        <td>".$result['domain']."</td>
        <td>".$result['webinar']."</td>
        </tr>
        ";
    }
    
}
else{
    echo "no record found";
}

?>
</table>
</h1>
</body>
</html>