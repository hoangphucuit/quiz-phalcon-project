{{ form("session/start") }}
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Đăng nhập</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css"> -->
        <script src="/assets/bootstrap/js/bootstrap.min.js"></script>

    </head>
<div id="bodypage" style="background-image: url(/img/background.jpg);height: 1000px" >
<div id="login"  >
        <div class="container"  >
      <div class="row">
        <div class="col-md-5 col-md-offset-4" style="padding-top: 200px">

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
  </div>