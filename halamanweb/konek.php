<?php
$host ="localhost";
$username="root";
$password="";
$dbname="santri";

$konek=mysqli_connect($host,$username,$password,$dbname);
if($konek){
}
else{

    echo "maaf tidak konek";
}
?>