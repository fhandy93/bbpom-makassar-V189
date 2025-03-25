<?php
$request = $_SERVER['REQUEST_URI'];
 

switch ($request) {
    case '/' :
        require __DIR__ . '/html-version/source/src/dashboard.content.php';
        break;
    case '/index.php' :
        require __DIR__ . '/html-version/source/src/dashboard.content.php';
        break;
    case '/index.php?module=dashboard' :
        require __DIR__ . '/html-version/source/src/dashboard.content.php';
        break;
    case '/index.php?module=sample' :
        require __DIR__ . '/html-version/source/src/dashboard.content.php';
        break;
    case '/index.php?module=kuisioner' :
        require __DIR__ . '/html-version/source/src/dashboard.content.php';
        break;
    case '/index.php?module=proses_kuisioner' :
        require __DIR__ . '/html-version/source/src/proses_kuisioner.php';
        break;
    case '/index.php?module=kuisioner&status=isi' :
        require __DIR__ . '/html-version/source/src/dashboard.content.php';
        break;
    case '/index.php?module=kuisioner&status=sukses' :
        require __DIR__ . '/html-version/source/src/dashboard.content.php';
        break;
    case '/index.php?module=detail_sam&id='.$_GET['id'] :
        require __DIR__ . '/html-version/source/src/dashboard.content.php';
        break;
    case '/index.php?module=logout' :
        require __DIR__ . '/html-version/source/src/logout.php';
        break;
    case '/sappai/' :
        require __DIR__ . 'login.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '../login.php';
        break;
}