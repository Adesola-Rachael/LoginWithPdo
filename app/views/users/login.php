<?php require APPROOT .'/views/includes/head.php';?>


<body id="top-header">


<!-- LOADER TEMPLATE -->
<div id="page-loader">
    <div class="loader-icon fa fa-spin colored-border"></div>
</div>
<!-- /LOADER TEMPLATE -->

     <!-- NAVBAR
    ================================================= -->
        
  
 <!-- HERO
    ================================================== -->
    <?php require APPROOT .'/views/includes/nav.php';?>
 
    <div class="container">
        <div class="row  align-items-center justify-content-center">
            
            <div class="col-lg-3"></div>
            
            <div class="col-lg-6">
                 <div class="banner-contact-form bg-white">
                <h3 class="title" style="width:100%; margin:0px; text-align:center;">User Login</h3>

                    <form action="<?php echo URLROOT ?>/users/login" Method="POST">
                        <div class="form-group">
                            <input type="text" name="username" id="" class="form-control" placeholder="Enter Username">
                            <span class="invalidFeedback">
                                <?php echo $data['usernameError']; ?>
                             </span>

                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="" class="form-control" placeholder="Enter Password">
                            <span class="invalidFeedback">
                                <?php echo $data['passwordError']; ?>
                             </span>
                             
                        </div>
                        <button class="btn btn-dark btn-block btn-circled" id="submit" type="submit" >Submit</button>
                         
                        <p class="options">Not registered yet?<a href="<?php echo URLROOT ?>/users/register" type="submit" >Create an account</a></p>
                    </form>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
<?php require APPROOT .'/views/includes/footer.php';?>