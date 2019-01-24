<div class="container" id="main">    
    <div id="loginbox" style="margin-top:80px;" class="mainbox col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-primary" style="background-color: rgba(255, 255, 255, 0.43);border-color: transparent;" >
            <div class="text-center">
                <!--<img width="200px" height="auto" src="<?php echo site_url('assets/images/logo.png');?>">-->
                <h2>Logo</h2>
            </div>    

            <div style="padding-top:30px" class="panel-body" >

                <?php if(!empty(@$notif)){ ?>
                <div id="login-alert" class="alert alert-<?php echo @$notif['type'];?> col-sm-12"><?php echo @$notif['message'];?></div>
                <?php } ?>
                
                <form method="post" action="" class="form-horizontal" role="form">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="usuario" value="<?php echo $this->input->post('usuario');?>" placeholder="Usuario">                                        
                    </div>

                    <div style="margin-bottom:7px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Contraseña">
                    </div>


                    <div style="margin-top:15px" class="form-group">
                        <div class="col-sm-12 controls">
                            <input type="submit" class="btn btn-block btn-success" value="Ingresar">
                        </div>
                    </div>
  
                </form>     
                
            </div>                     
        </div>  
    </div>
</div>



