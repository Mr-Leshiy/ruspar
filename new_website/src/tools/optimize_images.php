<?php
/**
 * Скрипт для автоматичного створення мініатюр та оптимізованих версій фотографій.
 * Використання: просто запустіть `php tools/optimize_images.php` у терміналі,
 * якщо додали нові фотографії у папку images/new_gallery/
 */

$srcDir = __DIR__ . '/../images/new_gallery/';
$thumbDir = $srcDir . 'thumb/';
$optDir = $srcDir . 'optimized/';

if (!is_dir($thumbDir)) mkdir($thumbDir, 0777, true);
if (!is_dir($optDir)) mkdir($optDir, 0777, true);

// Get all jpg images
$files = glob($srcDir . '*.jpg');

function resizeImage($source, $destination, $maxWidth, $quality = 80) {
    if (file_exists($destination)) {
        return;
    }
    
    echo "Оптимізація: " . basename($source) . " -> " . basename($destination) . "...\n";
    $info = getimagesize($source);
    if (!$info) return;
    
    $width = $info[0];
    $height = $info[1];
    
    if ($width > $maxWidth) {
        $newWidth = $maxWidth;
        $newHeight = (int)($height * ($maxWidth / $width));
    } else {
        $newWidth = $width;
        $newHeight = $height;
    }
    
    $img = imagecreatefromjpeg($source);
    $newImg = imagecreatetruecolor($newWidth, $newHeight);
    
    imagecopyresampled($newImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    imagejpeg($newImg, $destination, $quality);
}

foreach ($files as $file) {
    $basename = basename($file);
    resizeImage($file, $thumbDir . $basename, 600, 80);
    resizeImage($file, $optDir . $basename, 1920, 80);
}

echo "Готово! Всі нові фото оптимізовані.\n";
?>
