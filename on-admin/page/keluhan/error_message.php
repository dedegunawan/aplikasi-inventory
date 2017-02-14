<div class="col-md-12">
    <?php
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }
    ?>
    <?php if (isset($errors) && $errors->any()): ?>
                  <div class="alert alert-danger" role="alert">
                  <?php foreach ($errors->all() as $error): ?>
                      <p><?php echo $error; ?></p>
                  <?php endforeach; ?>
                  </div>
   <?php endif; ?>
</div>
