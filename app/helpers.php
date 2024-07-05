<?php

if (!function_exists('trim_to_words')) {
    function trim_to_words($text, $limit = 2)
    {
        $words = explode(' ', $text);
        if (count($words) > $limit) {
            return implode(' ', array_slice($words, 0, $limit)) . '...';
        }
        return $text;
    }
}
