<style>
    html { font-family: 'Verdana'; text-align: center; }
    html, p, ul { margin: 0; }
    ul { list-style: none; }
    .success { color: green; }
    .error { color: red; }
</style>

<?php 
$tests = array(
    array(
        'func' => 'curl_init',
        'success' => 'CURL is beschikbaar.',
        'error' => 'CURL is niet beschikbaar.'
    ),
    array(
        'func' => 'simplexml_load_string',
        'success' => 'SimpleXML is beschikbaar.',
        'error' => 'SimpleXML is niet beschikbaar.'
    ),
    array(
        'func' => 'json_decode',
        'success' => 'JSON decode is beschikbaar',
        'error' => 'JSON decode is niet beschikbaar'
    )
);

$errors = 0;
?>

<h1>Dashboard test</h1>
<ul>
    <?php
    foreach ($tests as $test) {
        echo '<li>';
        if (function_exists($test['func'])) {
            echo '<p class="success">' . $test['success'] . '</p>';
        } else {
            echo '<p class="error">' . $test['error'] . '</p>';
            $errors++;
        }
        echo '</li>';
    }
    ?>
</ul>

<h3 class="<?php echo ($errors == 0) ? 'success' : 'error'; ?>">
    <?php
    if ($errors == 0) {
        echo 'Alle tests zijn geslaagd!';
    } else {
        echo 'Er zijn ' . $errors . ' die aandacht nodig hebben!';
    }
    ?>
</h3>

<h1>PHP Info</h1>
<div>
    <?php echo phpinfo(); ?>
</div>