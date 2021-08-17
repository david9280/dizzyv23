<?php
/**
 * @package     ImageFilter class
 * @version     1.0
 * @author      Prakash Bhandari (http://www.prakashbhandari.com.np)
 * @license     This software is licensed under the MIT license: http://opensource.org/licenses/MIT
 * @copyright   Prakash Bhandari (http://www.prakashbhandari.com.np)
 */

namespace imageFilter;

use Exception;

/**
 * Class ImageFilter
 * @package imageFilter
 */
class ImageFilter
{
    /**
     * @var
     */
    protected $image, $filename, $image_information, $height, $width;

    /**
     * @param null $filename
     */
    function __construct($filename = null)
    {
        if ($filename) {
            $this->load($filename);
        } else {
            return false;
        }
        return $this;
    }

    /**
     * Destroy image resource
     *
     */
    function __destruct()
    {
        /*
        if ($this->image !== null) {
            if(is_object($this->image) && $this->image instanceof \GDImage) {
                imagedestroy($this->image);
            }
        }
        */
        if ($this->image !== null) { 
            $gd = get_resource_type($this->image);
            if ($gd === 'gd') {
                imagedestroy($this->image);
            }
        }
    }

    /**
     * @param $filename
     * @return mixed
     * @throws Exception
     */
    public function load($filename)
    {
        // Require GD library
        if (!extension_loaded('gd')) {
            throw new Exception('Required extension GD is not loaded.');
        }
        $this->filename = $filename;
        return $this->get_image_information();
    }

    /**
     * @return string
     */
    function get_orientation()
    {
        if (imagesx($this->image) < imagesy($this->image)) {
            return 'portrait';
        }
        if (imagesx($this->image) > imagesy($this->image)) {
            return 'landscape';
        }
        return 'square';
    }

    /**
     * @param $filename
     * @return mixed|string
     */
    protected function file_ext($filename)
    {
        if (!preg_match('/\./', $filename)) {
            return '';
        }
        return preg_replace('/^.*\./', '', $filename);
    }

    /**
     * @return $this
     * @throws \Exception
     */
    private function get_image_information()
    {
        $information = getimagesize($this->filename);
        $mime = $information['mime'];
        if ($mime == 'image/gif') {
            $this->image = imagecreatefromgif($this->filename);
        } else if ($mime == 'image/jpeg') {
            $this->image = imagecreatefromjpeg($this->filename);
        } else if ($mime == 'image/png') {
            $this->image = imagecreatefrompng($this->filename);
        } else {
            throw new Exception('Invalid image: ' . $this->filename);
        }

        $this->image_information = array(
            'width' => $information[0],
            'height' => $information[1],
            'orientation' => $this->get_orientation(),
            'exif' => function_exists('exif_read_data') && $mime === 'image/jpeg' ? $this->exif = @exif_read_data($this->filename) : null,
            'format' => preg_replace('/^image\//', '', $mime),
            'mime' => $mime
        );
        $this->width = $information[0];
        $this->height = $information[1];
        imagesavealpha($this->image, true);
        imagealphablending($this->image, true);
        return $this;
    }

    /**
     * @param null $filename
     * @param null $quality
     * @param null $format
     * @return $this
     * @throws \Exception
     */
    public function saveFile($filename = null, $quality = null, $format = null)
    {
        $filename = $filename ? : $this->filename;
        if (!$format) {
            $format = $this->file_ext($filename) ? : $this->image_information['format'];
        }
        $format = strtolower($format);

        if ($format == 'gif') {
            $result = imagegif($this->image, $filename);
        } elseif ($format == 'jpg' || $format == 'jpeg') {
            imageinterlace($this->image, true);
            $result = imagejpeg($this->image, $filename, round($quality));
        } elseif ($format == 'png') {
            $result = imagepng($this->image, $filename, round(9 * $quality / 100));
        } else {
            throw new Exception('Unsupported format');
        }
        if (!$result) {
            throw new Exception('Unable to save image: ' . $filename);
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function grayScale()
    {
        imagefilter($this->image, IMG_FILTER_GRAYSCALE);
        return $this;
    }

    /**
     * @return $this
     */
    public function reverses()
    {
        imagefilter($this->image, IMG_FILTER_NEGATE);
        return $this;
    }

    /**
     * @param $level : The range for the brightness is -255 to 255
     * @return $this
     */
    public function brightness($level = 0)
    {
        imagefilter($this->image, IMG_FILTER_BRIGHTNESS, $level);
        return $this;
    }

    /**
     * @param int $level : The range for the contrast is -100 to 100
     * @return $this
     */
    public function contrast($level = 0)
    {
        imagefilter($this->image, IMG_FILTER_CONTRAST, $level);
        return $this;
    }

    /**
     * @param string $type : 'selective' or 'gaussian'
     * @param int $times : Number of times to apply the filter
     * @return $this
     */
    function blur($type = 'gaussian', $times = 1)
    {
        if (strtolower($type) == "selective")
            $type = IMG_FILTER_SELECTIVE_BLUR;
        else
            $type = IMG_FILTER_GAUSSIAN_BLUR;

        for ($i = 0; $i < $times; $i++) {
            imagefilter($this->image, $type);
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function edgeDetect()
    {
        imagefilter($this->image, IMG_FILTER_EDGEDETECT);
        return $this;
    }

    /**
     * @return $this
     */
    public function emboss()
    {
        imagefilter($this->image, IMG_FILTER_EMBOSS);
        return $this;
    }

    /**
     * @return $this
     */
    public function meanRemoval()
    {
        imagefilter($this->image, IMG_FILTER_MEAN_REMOVAL);
        return $this;
    }

    /**
     * @param int $level : range -8 to 8
     * @return $this
     */
    public function smooth($level = 0)
    {
        imagefilter($this->image, IMG_FILTER_SMOOTH, $level);
        return $this;
    }

    /**
     * @param int $level
     * @return $this
     */
    public function pixelation($level = 0)
    {
        imagefilter($this->image, IMG_FILTER_PIXELATE, $level);
        return $this;
    }

    /**
     * @param int $red 0-255
     * @param int $green 0-255
     * @param int $blue 0-255
     * @return $this
     */
    public function colorize($red = 0, $green = 0, $blue = 0)
    {
        imagefilter($this->image, IMG_FILTER_COLORIZE, $red, $green, $blue);
        return $this;
    }
}