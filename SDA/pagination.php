<?php
//Set get variable for the page count
//write the query to get all products
//Get the number of rows


if(isset($_GET['page'])){
$page  = preg_replace("#[^0-9]#", "", $_GET['page']);
}else{
	$page = 1;
}


$perpage  = 6;

$lastPage  = ceil($row/$perpage);

if($page<1){
	$page = 1;
}elseif ($page>$lastPage) {
	$page = $lastPage; 
}

$midleNumbers  = '';

$add1   = $page+1;
$add2   = $page+2;
$sub1   = $page-1;
$sub2   = $page-2;

if($page == 1){

}