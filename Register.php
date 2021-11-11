<link rel="stylesheet" type="text/css" href="style.css"/>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/jquery-3.2.0.min.js"/></script>
<script src="js/jquery.dataTables.min.js"/></script>
<script src="js/dataTables.bootstrap.min.js"/></script>
<?php
    if(isset($_POST['btnRegister']))
    {
        $us = $_POST['txtUsername'];
        $pass1 = $_POST['txtPass1'];
        $pass2 = $_POST['txtPass2'];
        $fullname = $_POST['txtFullname'];
        $email = $_POST['txtEmail'];
        $address = $_POST['txtAddress'];
        $tel = $_POST['txtTel'];

        if(isset($_POST['grpRender']))
        {
            $sex =$_POST['grpRender'];
        }

        $err = "";
        if(strlen($pass1) <=5)
        {
            $err .= "<li>Password must be greater than 5 chars</li>";
        }
        if($pass1 != $pass2)
        {
            $err .= "<li>Password and confirm password are must the same</li>";
        }
        if($err !="")
        {
            echo $err;
        } 
        else
        {
            include_once("connection.php");
            $pass = md5($pass1);
            $sq = "SELECT * FROM public.useraccount WHERE Username='$us'OR email='$email'";
            $res = pg_query($conn, $sq);
            if(pg_num_rows($res)==0)
            {
                pg_query($conn, "INSERT INTO useraccount (username, password, fullname, gender, address, telephone, email, state) 
                VALUE ('$us','$pass','$fullname', '$sex', '$address','$tel','$email','0')"); 
                echo '<script>alert("Register successful");</script>';
                echo'<meta http-equiv="refresh" content="0;URL=index.php">';
            }
            else
            {
                echo "Username or email already exists";
            }
        }
    }
?>

<div class="container">
        <h2>Member Registration</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    
                            <label for="txtTen" class="col-sm-2 control-label">Username(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value=""/>
							</div>
                      </div>  
                      
                       <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Password(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass1" id="txtPass1" class="form-control" placeholder="Password"/>
							</div>
                       </div>     
                       
                       <div class="form-group"> 
                            <label for="" class="col-sm-2 control-label">Confirm Password(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass2" id="txtPass2" class="form-control" placeholder="Confirm your Password"/>
							</div>
                       </div>     
                       
                       <div class="form-group">                               
                            <label for="lblFullName" class="col-sm-2 control-label">Full name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtFullname" id="txtFullname" value="" class="form-control" placeholder="Enter Fullname"/>
							</div>
                       </div> 
                       
                       <div class="form-group">      
                            <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtEmail" id="txtEmail" value="" onclick="checkEmail()" class="form-control" placeholder="Email"/>
							</div>
                       </div>  
                       
                        <div class="form-group">   
                             <label for="lblDiaChi" class="col-sm-2 control-label">Address(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtAddress" id="txtAddress" value="" class="form-control" placeholder="Address"/>
							</div>
                        </div>  
                        
                         <div class="form-group">  
                            <label for="lblDienThoai" class="col-sm-2 control-label">Telephone(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTel" id="txtTel" value="" class="form-control" placeholder="Telephone" />
							</div>
                         </div> 
                         
                          <div class="form-group">  
                            <label for="lblGioiTinh" class="col-sm-2 control-label">Gender(*):  </label>
							<div class="col-sm-10">                              
                                      <label class="radio-inline"><input type="radio" name="grpGender" value="0" id="grpRender"  />
                                      Male</label>
                                    
                                      <label class="radio-inline"><input type="radio" name="grpGender" value="1" id="grpRender" />
                                      
                                      Female</label>

							</div>
                          </div> 
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnRegister" id="btnRegister" value="Register"/>
                              	
						</div>
                     </div>
				</form>
</div>
    

