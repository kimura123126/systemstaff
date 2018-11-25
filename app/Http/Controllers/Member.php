<?php
namespace App\Http\Controllers;

use App\Member1;
/**
 *  
 */
class Member extends Controller
{
		 public function  info(){

		 	return Member1::getMember();
		 	
		 }
	
}


?>