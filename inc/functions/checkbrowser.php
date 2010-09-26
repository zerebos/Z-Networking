<?php
function ae_detect_ie()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}

function ae_detect_opera()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false))
        return true;
    else
        return false;
}

function ae_detect_mozilla()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'Mozilla') !== false) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') == false) )
        return true;
    else
        return false;
}
?>