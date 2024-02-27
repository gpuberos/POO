<?php 

require __DIR__ . '/classes/form.class.php';
require __DIR__ . '/classes/text.class.php';

$form = new Form($_POST);

var_dump(Text::withZero(4));

?>

<form action="#" method="post">
    <?php
        echo $form->input('username');
        echo $form->input('password');
        echo $form->submit();
    ?>
</form>


    

