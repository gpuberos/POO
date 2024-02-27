    <?php

    use \Tutorial\HTML\Form;

    require __DIR__ . '/classes/Form.php';
    require __DIR__ . '/classes/Text.php';

    $form = new \Tutorial\HTML\Form($_POST);
    
    var_dump(Text::withZero(10));

    ?>

    <form action="#" method="post">
        <?php
        echo $form->input('username');
        echo $form->input('password');
        echo $form->submit();
        ?>
    </form>
