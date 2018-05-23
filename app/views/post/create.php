<?php $this->start('head'); ?>
	<meta name="someMetaTag" content="Some tag">
<?php $this->end('head'); ?>


<?php $this->start('body'); ?>
	<p>Some Body</p>
<?php $this->end('body'); ?>


<?php $this->start('script'); ?>
	<script>
		alert('Some script');
	</script>
<?php $this->end('script'); ?>