<?php
class Image
{
    public $images = [];

    public function __construct($images)
    {
        $this->images = $images;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function checkValidity()
    {
        $check = true;
        $sizes = [];
        foreach ($this->images['tmp_name'] as $key => $value) {
            $size = getimagesize($value);
            if ($size !== false) {
                $sizes[$key] = $size;
            } else {
                $check &= false;
            }
            if ($size) {
                $this->images['res'][$key] = $size;
            }
        }
        return $check;
    }

    public function updloadResize()
    {
        // echo '<pre>';
        // print_r($this->images);
        // echo '</pre>';
        // die;
        $uploadedFile = [];
        foreach ($this->images['name'] as $key => $value) {
            // set name prefix
            $prefix = time() . '-';

            // get size
            $width = $this->images['res'][$key][0];
            $height = $this->images['res'][$key][1];

            // get orientation, 1 for landscape
            $orientation = ($width > $height) ? 1 : 0;

            // set directory
            $target_dir = "../public/img/";

            //set filename
            $original_name = $value;

            // set upload directory
            $target_file = $target_dir . basename($prefix . $original_name);
            $target_small_file = $target_dir . '/thumbnail/' . basename($prefix . $original_name);

            // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Resize image to 1200px width while maintaining aspect ratio
            if ($orientation == 1) {
                $newWidth = 1200;
                $newHeight = intval($newWidth * $height / $width);
                $newSmallWidth = 20;
                $newSmallHeight = intval($newSmallWidth * $height / $width);
            } else {
                $newHeight = 1200;
                $newWidth = intval($newHeight * $width / $height);
                $newSmallHeight = 20;
                $newSmallWidth = intval($newSmallHeight * $width / $height);
            }

            // Create GD image resources
            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
            $resizedSmallImage = imagecreatetruecolor($newSmallWidth, $newSmallHeight);
            $sourceImage = null;
            $sourceSmallImage = null;

            // get image file type
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check image type and create appropriate GD image resource
            switch ($imageFileType) {
                case 'jpg':
                case 'jpeg':
                    $sourceImage = imagecreatefromjpeg($this->images['tmp_name'][$key]);
                    $sourceSmallImage = imagecreatefromjpeg($this->images['tmp_name'][$key]);
                    break;
                case 'png':
                    $sourceImage = imagecreatefrompng($this->images['tmp_name'][$key]);
                    $sourceSmallImage = imagecreatefrompng($this->images['tmp_name'][$key]);
                    break;
                case 'gif':
                    $sourceImage = imagecreatefromgif($this->images['tmp_name'][$key]);
                    $sourceSmallImage = imagecreatefromgif($this->images['tmp_name'][$key]);
                    break;
                default:
                    echo "Unsupported image type.";
                    exit;
            }

            $uploadedFile[$key]['name'] = $prefix . $original_name;
            $uploadedFile[$key]['orientation'] = $orientation;

            // Resize and save the image
            imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagecopyresampled($resizedSmallImage, $sourceSmallImage, 0, 0, 0, 0, $newSmallWidth, $newSmallHeight, $width, $height);
            imagejpeg($resizedImage, $target_file);
            imagejpeg($resizedSmallImage, $target_small_file);

            // Free up memory
            imagedestroy($resizedImage);
            imagedestroy($sourceImage);
            imagedestroy($resizedSmallImage);
            imagedestroy($sourceSmallImage);
        }
        return $uploadedFile;
    }
}
