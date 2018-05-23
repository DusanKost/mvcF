<?php $this->start('body'); ?>

  <?php if(!empty($this->errors)): ?>
  	<div class="alert alert-danger" role="alert">
  		<?php foreach($this->errors as $error): ?>
  		<p><?php echo $error;  ?></p>
    	<?php endforeach; ?>
    </div>
  <?php endif; ?>

<form class="form-signin" action="<?=PROOT?>login/create" method="post">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="text" id="inputEmail" class="form-control" name="email" placeholder="Email address">
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Login in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>

<?php $this->end('body') ?>