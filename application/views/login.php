<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
        <meta name="generator" content="" />
        <title>Login to admin</title>


        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

        <!-- Favicons -->
        <link rel="icon" href="<?php echo base_url("favicon.ico"); ?>">
        <meta name="theme-color" content="#563d7c" />

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url("assets/css/floating-labels.css"); ?>" rel="stylesheet" />
    </head>
    <body>
        <div class="row form-signin bg-white">
            
            <img  src="https://texcutive.com/webassets/images/logo.png" style="height:110px;width: 100%;background: #254354;">
        </div>
        
        <div class="row">
            <form action="" method="post" class="form-signin bg-white p-3">
                <div class="text-center mb-4">
                    
                    <h1 class="h3 mb-3 mt-2 font-weight-normal">Login to control panel</h1>
                    <p class="">
                    Manage your texcutive services and more.
                    </p>
                </div>

                <?php echo validation_errors(); 
                if(isset($message)) echo $message;
                
                ?>

                <div class="form-label-group">
                    <input type="text" name="username" value="<?php echo set_value('username'); ?>" id="username" class="form-control" placeholder="Username" required autofocus />
                    <label for="username">Username</label>
                </div>

                <div class="form-label-group">
                    <input type="password" name="password" value="<?php echo set_value('password'); ?>"  id="password" class="form-control" placeholder="Password" required />
                    <label for="password">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label> <input type="checkbox" value="remember-me" /> Remember me </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </body>
</html>
