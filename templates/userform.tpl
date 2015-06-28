<form role="form" method="post" action="/index.php?route=<?php echo $route; ?>&action=<?php echo $action; ?>&id=<?php echo $id; ?>">
  <?php foreach ($error as $key => $value) { ?>
  <div class="alert alert-danger">
    <?php echo $value; ?>
  </div>
  <?php } ?>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
  </div>
  <div class="form-group">
    <label for="firstname">Firstname:</label>
    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname; ?>">
  </div>
  <div class="form-group">
    <label for="lastname">Lastname:</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
  </div>
  <button type="submit" class="btn btn-primary"><?php echo $button_submit; ?></button>
  <a href="/index.php?route=<?php echo $route; ?>" class="btn btn-default"><?php echo $button_cancel; ?></a>
</form>