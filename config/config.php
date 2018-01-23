<?php

$con = mysqli_connect("localhost","root","","marathon");
if(!$con)
{
     echo "Unable to connect to database".mysqli_error($con);
}
else{
   // echo "OK";
}