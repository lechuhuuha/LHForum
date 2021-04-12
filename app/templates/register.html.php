<link href="<?php echo URLROOT ?>css/loginstyle.css" rel="stylesheet" type="text/css" />
<div class="col-md-9">
  <div class="modal-wrap">
    <div class="modal-bodies">
      <div class="modal-body modal-body-step-1 is-showing">
        <div class="title">Sign Up</div>
        <div class="description">Hello there, Register Form</div>
        <form action="" method="POST">

          <label for="email"> Email </label>
          <input type="email" name="user[email]" value="<?= $email['email'] ?? '' ?>" placeholder="E-Mail*" />
          <span style="color:red"> <?= $errors['email'] ?? '' ?></span>
          <label for="username"> Username </label>
          <input type="text" name="user[username]" value="<?= $user['username'] ?? '' ?>" placeholder="Username*" />
          <span style="color:red"> <?= $errors['username'] ?? '' ?></span>

          <label for="password">Password</label>
          <input type="password" name="user[password]" value="<?= $user['password'] ?? '' ?>" placeholder="Password*" />
          <span style="color:red"> <?= $errors['password'] ?? '' ?></span>

          <label for="cf_pass"> Confirm Password </label>
          <input type="password" name="user[cfPassword]" value="<?= $user['cfPassword'] ?? '' ?>" placeholder="Confirm Password*" />
          <span style="color:red"> <?= $errors['cfPassword'] ?? '' ?></span>

          <div class="col-md-12">
            <div class="row text-center sign-with">
              <div class="col-md-12">
                <h3> Or sign in with</h3>
              </div>
              <div class="col-md-12 sign-in28912">
                <div class="btn-group btn-group-justified">
                  <a href="#" class="btn btn-primary btn-primary3838"> <i class="fa fa-facebook-official"></i> Facebook</a>
                  <a href="#" class="btn btn-danger btn-danger37883"> <i class="fa fa-google"></i> Google</a>
                </div>
                <br>
              </div>
            </div>
          </div>
          <div class="publish-button2389 text-center ">
            <input type="submit" class="publis1291" style="width: 50%;" name="submit" value="Submit">

          </div>
        </form>
      </div>
    </div>
  </div>
</div>