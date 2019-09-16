<?php

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Poll.php');

try {
    $poll = new \MyApp\Poll();
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

$results = $poll->getResults();
// var_dump($results);
// exit;
// $results = [
//     0 => 12,
//     1 => 22,
//     2 => 33
// ];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Poll Result</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Result ...</h1>
        <div class="row">
            <?php for ($i = 0; $i < 3; $i++): ?>
                <div class="box" id="box_<?php echo h($i); ?>"><?php echo h($results[$i]); ?></div>
            <?php endfor; ?>
        </div>
        <a href="/"><div id="btn">Go Back</div></a>
</body>

</html>