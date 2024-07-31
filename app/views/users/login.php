<?php require APPROOT . '/views/inc/header.php'; ?>



<div class="container marginlogin">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body mt-5">
                <center> <h2>LOGIN</h2> </center>

                
                <form action="<?php echo URLROOT ?>/users/login" method="post">

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control form-control-lg
                                   <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>"
                            value="<?php echo $data['email'] ?>"
                        />
                        <span class="invalid-feedback"><?php echo $data['email_err']?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control form-control-lg
                                   <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>"
                            value="<?php echo $data['password'] ?>"
                        />
                        <span class="invalid-feedback"><?php echo $data['password_err']?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="login" class="btn btn-primary btn-block"/>
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT ?>/users/register" class="btn btn-light py-3 px-5">No account? Register</a>
                        </div>
                    </div>
                </form>
                <div class="form-group">
                    </div>
            </div>
        </div>
</div>
</div>

<br>
<br>
<br>
<br>
<br>

<?php require APPROOT . '/views/inc/footer.php'; ?>