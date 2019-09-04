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

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Poll</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Which do you like?</h1>
    <form action="" method="post">
        <div class="row">
            <div class="box" id="box_0" data-id="0"></div>
            <div class="box" id="box_1" data-id="1"></div>
            <div class="box" id="box_2" data-id="2"></div>
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
        });
    </script>
</body>

</html>