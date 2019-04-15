<?php
/**
 * Sachin Patel Copyright (c) 2019.
 */


function prd($data)
{
    echo "<pre>";
    print_r($data);
    exit;
}

function encode($id, $key = "")
{
    $len = 10;
    $md5_key = (!empty($key) ? md5($key) : md5('!7l@S*3h7_s54P-e543lp'));
    $len_jobid = 16;
    $sub_md5key1 = substr($md5_key, 0, $len);
    $sub_md5key2 = substr($md5_key, $len);
    return $sub_md5key1 . $id . $sub_md5key2;
}

function decode($encodeid, $vauletype = 'integer')
{
    $strRet = "";
    $len = 10;
    $sub_md5key1 = substr($encodeid, 0, $len);
    $sub_md5key2 = substr($encodeid, -1 * (32 - $len));
    $strRet = str_replace(array($sub_md5key1, $sub_md5key2), '', $encodeid);
    if ($vauletype == 'integer')
        $strRet = (int)$strRet;
    else
        $strRet = $strRet;

    return $strRet;
}


