<?php 
	include "db_config.php";
	class User extends Database{
		
		/*** for registration process ***/
		public function reg_user($name,$username,$password,$email,$ustatus){
			$password = md5($password);
			$sql="SELECT * FROM users WHERE uname='$username' OR uemail='$email'";
			
			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO users SET uname='$username', upass='$password', fullname='$name', uemail='$email', ustatus='$ustatus'";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}
		}


		/*** for login process ***/
		public function check_login($emailusername, $password){
        	
        	$password = md5($password);
			$sql2="SELECT uid from users WHERE uemail='$emailusername' or uname='$emailusername' and upass='$password' AND ustatus=1";
			
			//checking if the username is available in the table
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;
		
	        if ($count_row == 1) {
	            // this login var will use for the session thing
	            $_SESSION['login'] = true; 
	            $_SESSION['uid'] = $user_data['uid'];
	            return true;
	        }
	        else{
			    return false;
			}
    	}

    	/*** for showing the username or fullname ***/
    	public function get_fullname($uid){
    		$sql3="SELECT fullname FROM users WHERE uid = $uid";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        echo $user_data['fullname'];
    	}


    	/* Get All USers
    	*/

    	public function get_alluser(){
    		$sql4="SELECT * FROM users";
	        $result = mysqli_query($this->db,$sql4);

	        	while($row4=mysqli_fetch_array($result))
	        	{


	        		$uid=$row4['uid'];
	        		$ustatus=$row4['ustatus'];



	        		echo "<tr>
      <th scope='row'>".$row4['uid']."</th>
      <td>".$row4['uname']."</td>
      <td>".$row4['uemail']."</td>
      <td>";

      if($ustatus==0)
      {
      echo "<button class='btn btn-danger'><a href='status_user.php?uid=$uid&ustatus=1'>Active</a></button>";
      }

      else
      {
      	echo "<button class='btn btn-success' ><a href='status_user.php?uid=$uid&ustatus=0'>Deactive</a></button>";

      }


      echo "| <a href='modifyuser.php?uid=$uid&action=edit'><span class='glyphicon glyphicon-edit'>
        </span>Edit</a> | <a href='modifyuser.php?uid=$uid&action=delete'><span class='glyphicon glyphicon-remove'>
        </span>Delete</a> </td>
    </tr>";


	        	}
    	}


  
    	/*** starting the session ***/
	    public function get_session(){   
		
	        return $_SESSION['login'];
	    }

	    public function user_logout() {
	       $_SESSION['login'] = FALSE;
	        session_destroy();
	    }



	    public function update_status($statusid, $ustatus){
    		
    		$sql5="UPDATE users SET ustatus=$ustatus WHERE uid = $statusid";
	        $result = mysqli_query($this->db,$sql5);


	       

	       header("location: manageuser.php");
	        
    	}

    	public function edituser($uid_)
    	{


    		$sql6="SELECT * FROM users where uid=$uid_";
	        $result = mysqli_query($this->db,$sql6);

	        	while($row6=mysqli_fetch_array($result))
	        	{


	        		$upass=$row6['upass'];

	        		$fullname=$row6['fullname'];


	        	}

	        		echo "<form method='post' action='' name='frmedit' ecntype='multipart-form-data'>";

	        		echo "Password <input type = 'text' name = 'upass_new'  /><br/>";

	        		echo "
	        			<input type = 'hidden' name = 'upass' value = $upass />

	        		Full Name <input type = 'text' name = 'fullname' value = $fullname /><br/><br/>";

	        		echo "<input type = 'submit' name = 'submitUpdate' value = 'update' />";

	        			echo "<input type = 'reset' name = 'reset' value = 'Clear' />";
    		
 


    	}

    	public function deleteuser($uid)
    	{

    				$sql8="DELETE FROM users WHERE uid=$uid";
					 $result = mysqli_query($this->db,$sql8);
					 header("location: index.php");


    		
    	}

    	public function updateuser($upass_new, $upass, $fullname)
    	{

	if(!isset($upass_new))
	{

	$sql7="UPDATE users SET upass='$upass', fullname='$fullname' WHERE upass = $upass";

}
	else
	{
 			$password = md5($upass_new);
		$sql7="UPDATE users SET fullname='$fullname', upass='$password' WHERE upass = '$upass'";
		//$sql7 = "SELECT * from users";

	}

	        $result = mysqli_query($this->db,$sql7);

	       	if($result)
	       	{

	      	 header("location: manageuser.php");
	 	  	}

	 	  else
	 	  {
	 	  	echo "Something Wrong";
	 	  }
	 	}

    	}
	
?>