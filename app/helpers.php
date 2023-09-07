<?php
use App\Helpers\FormatBytesHelper;

if (!function_exists('formatBytes')) {
    /**
     * Format bytes to a human-readable string.
     *
     * @param  int  $bytes
     * @param  int  $precision
     * @return string
     */
    function formatBytes($bytes, $precision = 2)
    {
        return FormatBytesHelper::formatBytes($bytes, $precision);
    }
}
