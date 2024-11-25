<?php  
// Make sure $errors is initialized as an array
$errors = isset($errors) ? $errors : [];

if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>

