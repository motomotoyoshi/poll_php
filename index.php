<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Poll.php');

try {
    $poll = new \MyApp\Poll();
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $poll->post();
}

$err = $poll->getError();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Poll</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php if (isset($err)):?>
        <div class="error"><?= h($err);?></div>
    <?php endif; ?>
    <h1>Which do you like?</h1>
    <form action="" method="post">
        <div class="row">
            <div class="box" id="box_0" data-id="0"></div>
            <div class="box" id="box_1" data-id="1"></div>
            <div class="box" id="box_2" data-id="5"></div>
            <input type="hidden" id="answer" name="answer" value="">
        </div>
        <div id="btn">Vote and See Results</div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(function() {
            'use strict';

            $('.box').on('click', function() {
                $('.box').removeClass('selected');
                $(this).addClass('selected');
                $('#answer').val($(this).data('id'));
            });

            $('#btn').on('click', function() {
                if ($('#answer').val() === '') {
                    alert('Choose One!');
                } else {
                    $('form').submit();
                }
            });

            $('.error').fadeOut(3000);
        });
    </script>
</body>

</html>