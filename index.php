<?php

require __DIR__ . '/classes/Character.php';
require __DIR__ . '/classes/Form.php';
require __DIR__ . '/classes/Text.php';

$merlin = new Character('Merlin');
$merlin->regenerate();

var_dump($merlin);

$form = new Form($_POST);
var_dump(Text::withZero(10));

?>

<form action="#" method="post">
    <?php
    echo $form->input('username');
    echo $form->input('password');
    echo $form->submit();
    ?>
</form>
