<link rel="stylesheet" type="text/css" href="css/error.css">
<?php  if (count($errors) > 0) : ?>
    <div class="error">
        <?php foreach ($errors as $error) : ?>
            <div class="error"><?php echo $error ?></div>
        <?php endforeach ?>
    </div>

<?php endif ?>
