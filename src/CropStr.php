<?php

namespace I3bepb\CropStrBladeDirective;

class CropStr
{
    /**
     * Crop str by length
     *
     * @param string $str
     * @param int $length Byte without encoding
     *
     * @return string
     */
    protected function crop(string $str, int $length = 4096): string
    {
        return substr($str, 0, $length);
    }

    /**
     * Check need crop by length
     *
     * @param string $str
     * @param int $length Byte without encoding
     *
     * @return bool
     */
    protected function checkNeedCrop(string $str, int $length = 4096): bool
    {
        return $length < strlen($str);
    }

    /**
     * @param string $str
     * @param int $length Byte without encoding
     *
     * @return string
     */
    public function apply(string $str, int $length = 4096): string
    {
        if ($this->checkNeedCrop($str, $length)) {
            return htmlentities($this->crop($str, $length)) . '...';
        }
        return htmlentities($str);
    }
}
