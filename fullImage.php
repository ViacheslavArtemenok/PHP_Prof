<?php
// формируем массив
$add_files = scandir("images");
$files = [];
$full_img = '';
foreach ($add_files as $index => $item) {
    if ($index > 1) {
        $files[] = ['id' => --$index, 'name' => $item];
    }
}
foreach ($files as $item) {
    if ($item['id'] == $_GET['img']) {
        $full_img = $item['name'];
    }
}
include 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
    $loader = new Twig_Loader_Filesystem('templates');

    $twig = new Twig_Environment($loader);

    $template_full = $twig->loadTemplate('gallery_full.tmpl');

    echo $template_full->render(array(
        'files' => $files,
        'updated' => date("Y"),
        'full_img' => $full_img,
        'return' => $_SERVER['HTTP_REFERER']
    ));
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}
