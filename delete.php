<?php
session_start();

$m= new MongoClient();
$db= $m->pluto;
$collection=$db->user;
$qry=array("username"=>$_SESSION["username"]);
//echo $_SESSION['username'];
$collection->remove($qry, array("justOne" => true));
//echo "Delete Successful";

$collection2 = $db->userdata;
$qry=array("doc_id"=>1);
$check=$collection2->findOne($qry);
$n=$check['user_reg'];
$n--;

$d=$check['user_del'];
$d++;

$collection2->update(array("doc_id"=>1),array('$set'=>array('user_reg'=>$n,'user_del'=>$d)));



session_destroy();
header("Location:index.php");

?>