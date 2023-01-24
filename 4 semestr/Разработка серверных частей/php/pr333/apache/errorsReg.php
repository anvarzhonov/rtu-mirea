<?php  if (count($errorsReg) > 0) : ?>
  <div class="error">
  	<?php foreach ($errorsReg as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>