<?php

    // This controller handles the sitewide account logout. 

	namespace App\Controllers;

	class Logout extends BaseController
	{
		
		public function logout() 
		{
			$session = session(); 
			$session -> destroy(); // Deletes any sessions created

			// Redirects user to the landing page
			return redirect()->to('/'); 
		}

	}

?>
