1.\\CLSERVER\development\stalin\football\application\views\user\header.php

2.\\CLSERVER\development\stalin\football\application\views\user\tradingdialog.php

3.\\CLSERVER\development\stalin\football\assets\js\common_jquery.js

4.\\CLSERVER\development\stalin\football\assets\css\football-web.css

5.New file added
    JS Folder
  1.\\CLSERVER\development\stalin\football\assets\js\jquery.form.min.js
  
  2.\\CLSERVER\development\stalin\football\assets\js\sweetalert.min.js
  
  Css Folder:
  
  1.\\CLSERVER\development\stalin\football\assets\css\sweetalert.css
    1.\\CLSERVER\development\stalin\football\assets\css\football-web.css
  \\CLSERVER\development\stalin\football\application\views\user\right_content.php
  
  \\CLSERVER\development\stalin\football\application\views\user\friend_list.php
  
    \\CLSERVER\development\stalin\football\application\controllers\user.php
    
     public function get_user_autocomplete()
	 {
		
   	    $data = $this->user_model->search_user();
   	    $users_friends_arr = $this->user_model->get_friends_list($this->session->userdata('user_id'),"1,2");
		
		  echo json_encode($data);
	 }
  
 \\CLSERVER\development\stalin\football\application\config\config.php
  \\CLSERVER\development\stalin\football\application\helpers\common_helper.php
