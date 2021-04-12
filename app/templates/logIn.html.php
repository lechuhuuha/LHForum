<link href="<?php echo URLROOT ?>css/loginstyle.css" rel="stylesheet" type="text/css">
<?php
if (isset($errors)) :
  echo '<div class="errors">' . $errors . '</div>';
endif;
?>
<div class="col-md-9">
  <div class="modal-wrap">

    <div class="modal-bodies">
      <div class="modal-body modal-body-step-1 is-showing">
        <div class="title">Log In</div>
        <div class="description">Hello there, Log In</div>
        <form action="" method="POST">
          <input type="text" name="username" placeholder="username" />
          <input type="password" name="password" placeholder="password" />
          <div class="text-center">
            <button class="button" type="submit">Login</button>
            <a href="<?= URLROOT ?>user/register" target="_blank">
              <div class="button">Create an account</div>
            </a>
          </div>
        </form>
      </div>


    </div>
  </div>
</div>