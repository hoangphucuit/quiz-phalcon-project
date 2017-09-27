<div id="login">
		<div class="container">
      <div class="row">
        <div class="col-md-5 col-md-offset-4">

    			<form class="form-horizontal" role="form" method="post" >
    				<h2 class="text-center login-word">Đăng nhập</h2>
                        
            <div class="input-group"> 
              <span class="input-group-addon " style="font-size:30px" ><i class="glyphicon glyphicon-user "></i></span>
              <input class="form-control icon-fa " name="email" placeholder="USERNAME" type="" />
            </div>
            
            <div class="input-group "> 
              <span class="input-group-addon" style="font-size:30px"><i class="glyphicon glyphicon-lock"></i></span>
              <input class="form-control icon-fa" name="password" placeholder="PASSWORD" type="password"/>
            </div>
            
            <div class="checkbox login-word">
            <label>
              <input id="login-remember" type="checkbox" name="remember" value="1"> <b>Ghi nhớ đăng</b> <b style="color:#960D37">nhập</b>
              </label>
            </div>
            <?php
            if (isset($wrong)){ 
                $this->flash->error(
                    "Sai mật khẩu hoặc user"
                );
            }
            ?>
            <div class="row">
              <div class="col-md-4">
                <input type="submit" class="btn-login btn-lg btn btn-success" value="Đăng nhập">
              </div> 
              
            </div> 
            <cfif rc.error_message neq "">
              <div class="form-group notice"> 
              </div>
            </cfif>  			
          </form>
         
        </div> 
		  </div>	
	  </div>
  </div>