<?php
function getCache($url)
{
    $url = getCacheFile($url);
    $cachefile = getCachePath()."/".basename($url, '.php') . '.cache';
    clearstatcache();
    if (file_exists($cachefile) && filemtime($cachefile) > time() - (60*60)) {
        $handle = fopen($cachefile, "r");
        $contents = fread($handle, filesize($cachefile));
        fclose($handle);
        return $contents;
    }
    return "KO";
}
function writeCache($url, $contents)
{
    $url = getCacheFile($url);
    $cachefile = getCachePath()."/".basename($url, '.php') . '.cache';
    $handle = fopen($cachefile, "w");
    fwrite($handle, $contents);
    fclose($handle);
    return "OK";
}
function getCacheFile($url)
{
    return md5($url);
}