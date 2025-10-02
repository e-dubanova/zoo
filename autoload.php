<?php
spl_autoload_register(function ($class_name) {
  $base_dir = __DIR__ . '/src/';

  $class_name = str_replace('Zoo\\', '', $class_name);
  
  $file = $base_dir . str_replace('\\', '/', $class_name) . '.php';

  
  if (file_exists($file)) {
    require_once $file;
  }
});
