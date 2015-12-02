<?php

namespace p3\Http\Controllers;

use p3\Http\Controllers\Controller;

class FakerController extends Controller {

	public function _construct() {
	   # Put anything here that should happen before any of the other actions
	}

	/**
	* Responds to request to show randomly generated data
	*/
	public function showFakedata() {

	/**Call F. Zaninootto Faker Factory to create fake data for lorem ipsum, users, birthdates, emails, and bios */

	    $faker = \Faker\Factory::create();


	/**If number of lorem ipsum paragraphs is greater than 0, generate requested number of paragraphs.  */

	    if ($_POST['numLorem'] > 0) 
	      {
		   $lists=$faker->paragraphs($_POST['numLorem']);
	      }

	/**If number of users requested is greater than 0, generate those number of users.  */

	    if ($_POST['numUsers'] > 0) 
	      {
		for ($i=0; $i < $_POST['numUsers']; $i++) 
		{
		$users[$i]['name'] = $faker->name;

	/**If birthdates is requested, generate birthdates for number of users.  */

		if ($_POST['birthdates'] === 'True' )  
		{
		  $users[$i]['birthdate'] = $faker->date($format='Y-m-d', $max='1995-01-01');
		}


	/**If emails are requested, generate emails for number of users.  */

		if ( $_POST['email'] === 'True' )  {
		  $users[$i]['email'] =  $faker->safeEmail;
		}


	/**If bios are requested, generate bios for number of users.  */

		if ( $_POST['bios'] === 'True' )   {
		  $users[$i]['bio'] =  $faker->realText($maxNbChars = 200, $indexSize=2);

		}
		}

	/**Since users were requested, return view with lorem ipsum and user information.*/

	         return view('show')->with('lists', $lists)->with('users', $users); 
	      }
	     else
	      {

	/**Since users were not requested, return view with lorem ipsum only.*/

		 return view('show')->with('lists', $lists);
	      }
	}
}
