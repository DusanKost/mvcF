<?php $this->start('head'); ?>
	<meta name="Pusi ga">
<?php $this->end('head'); ?>

<?php $this->start('body'); ?>
	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	  <?php foreach($this->users as $user): ?>
	  	<p><?php echo $user->pass ?></p>
	  <?php endforeach; ?>

      <h1 class="display-4">Pricing</h1>
      <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
    </div>
<?php $this->end('body'); ?>

<?php $this->start('script'); ?>
	<script>
		alert('Pusi ga');
	</script>
<?php $this->end('script'); ?>



