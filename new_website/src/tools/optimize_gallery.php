<?php
$srcDir = __DIR__ . '/images/new_gallery/';
$thumbDir = $srcDir . 'thumb/';
$optDir = $srcDir . 'optimized/';

if (!is_dir($thumbDir)) mkdir($thumbDir, 0777, true);
if (!is_dir($optDir)) mkdir($optDir, 0777, true);

// Get all jpg images
$files = glob($srcDir . '*.jpg');

function resizeImage($source, $destination, $maxWidth, $quality = 80) {
    echo "Processing $source to $destination...\n";
    $info = getimagesize($source);
    if (!$info) {
        echo "Could not read $source\n";
        return;
    }
    
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
    
    // Save as JPEG (we could do WebP, but JPEG is 100% compatible and extension matches)
    imagejpeg($newImg, $destination, $quality);
    
    imagedestroy($img);
    imagedestroy($newImg);
}

foreach ($files as $file) {
    $basename = basename($file);
    // Thumb: 600px width
    resizeImage($file, $thumbDir . $basename, 600, 80);
    // Optimized Full: 1920px width
    resizeImage($file, $optDir . $basename, 1920, 80);
}

echo "Done!\n";
?>
