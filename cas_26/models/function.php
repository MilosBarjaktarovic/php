<?php

function getImages($folder)
{
    $allowed = ["jpg", "jpeg", "png", "gif", "webp"];
    $result = [];

    foreach (scandir($folder) as $file) {
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $result[] = $file;
        }
    }

    return $result;
}
