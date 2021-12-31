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

include 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  $loader = new Twig_Loader_Filesystem('templates');

  $twig = new Twig_Environment($loader);

  $template = $twig->loadTemplate('gallery.tmpl');

  echo $template->render(array(
    'files' => $files,
    'updated' => date("Y")
  ));
} catch (Exception $e) {
  die('ERROR: ' . $e->getMessage());
}
