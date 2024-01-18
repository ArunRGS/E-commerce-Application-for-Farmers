<?php

$con=new mysqli('localhost','root','','project');

if($con)
{   //echo"connect aachu!peh,thoo!!";
}
else
{   die(mysqli_error($con));
}


?>