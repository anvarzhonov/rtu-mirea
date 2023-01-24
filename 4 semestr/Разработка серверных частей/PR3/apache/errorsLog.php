<?php  if (count($errorsLog) > 0) : ?>
  <div class="error">
  	<?php foreach ($errorsLog as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>