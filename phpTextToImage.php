<?php
/**
 * phpTextToImage class
 * This class converts text to image in PHP
 * 
 * @author    Legend Blogs
 * @link    https://www.legendblogs.com
 */
class phpTextToImage {

    private $image;

    /**
     * Create image from text
     * @param string text to convert into image
     * @param string textColor
     * @param string backgroundColor
     * @param int font size of text
     * @param int width of the image
     * @param int height of the image
     */
    function createImage($text, $textColor = '', $backgroundColor = '', $fontSize = 22, $imgWidth = 600, $imgHeight = 300) {

        //text font path
        $font = 'font/Pacifico-Regular.ttf';

        //create the image
        $this->image = imagecreatetruecolor($imgWidth, $imgHeight);

        $colorCode = array('#ffffff','#db3236', '#f4c20d', '#3cba54', '#4c53cc', '#56aad8', '#61c4a8');
        
        if ($backgroundColor == '') {
            /* select random color */
            $backgroundColor = $this->hexToRGB($colorCode[rand(0, count($colorCode) - 1)]);
        } else {
            /* select background color as provided */
            $backgroundColor = $this->hexToRGB($backgroundColor);
        }
        
        if ($textColor == '') {
            /* select random color */
            $textColor = $this->hexToRGB($colorCode[rand(0, count($colorCode) - 1)]);
        } else {
            /* select background color as provided */
            $textColor = $this->hexToRGB($colorCode[rand(0, count($textColor) - 1)]);
        }

        $textColor = imagecolorallocate($this->image, $textColor['r'], $textColor['g'], $textColor['b']);
        $backgroundColor = imagecolorallocate($this->image, $backgroundColor['r'], $backgroundColor['g'], $backgroundColor['b']);

        imagefilledrectangle($this->image, 0, 0, $imgWidth - 1, $imgHeight - 1, $backgroundColor);

        //break lines
        $splitText = explode("\\n", $text);
        $lines = count($splitText);
        $angle = 0;

        foreach ($splitText as $txt) {
            $textBox = imagettfbbox($fontSize, $angle, $font, $txt);
            $textWidth = abs(max($textBox[2], $textBox[4]));
            $textHeight = abs(max($textBox[5], $textBox[7]));
            $x = (imagesx($this->image) - $textWidth) / 2;
            $y = ((imagesy($this->image) + $textHeight) / 2) - ($lines - 2) * $textHeight;
            $lines = $lines - 1;
            //add the text
            imagettftext($this->image, $fontSize, $angle, $x, $y, $textColor, $font, $txt);
        }
        return true;
    }

    /* function to convert hex value to rgb array */
    protected function hexToRGB($colour) {
        if ($colour[0] == '#') {
            $colour = substr($colour, 1);
        }
        if (strlen($colour) == 6) {
            list( $r, $g, $b ) = array($colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5]);
        } elseif (strlen($colour) == 3) {
            list( $r, $g, $b ) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
        } else {
            return false;
        }
        $r = hexdec($r);
        $g = hexdec($g);
        $b = hexdec($b);
        return array('r' => $r, 'g' => $g, 'b' => $b);
    }

    /**
     * Display image
     */
    function showImage() {
        header('Content-Type: image/png');
        return imagepng($this->image);
    }

    /**
     * Save image as png format
     * @param string file name to save
     * @param string location to save image file
     */
    function saveAsPng($fileName = 'text-image', $location = '') {
        $fileName = $fileName . ".png";
        $fileName = !empty($location) ? $location . $fileName : $fileName;
        return imagepng($this->image, $fileName);
    }

    /**
     * Save image as jpg format
     * @param string file name to save
     * @param string location to save image file
     */
    function saveAsJpg($fileName = 'text-image', $location = '') {
        $fileName = $fileName . ".jpg";
        $fileName = !empty($location) ? $location . $fileName : $fileName;
        return imagejpeg($this->image, $fileName);
    }

}
