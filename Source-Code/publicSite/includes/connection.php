<?php 
// open connection
	$conn = mysqli_connect("localhost","root","","supplements");
	if(!$conn){
		die('cannot connecto to server');
	}