<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

     <style>
         
         body,
html {
    margin:0;
    padding:0;
    color:#000;
    background:#dadada;
}

#header {
    padding:5px 10px;
    background:#20B2AA;
}

#wrapper {
    width:760px;
    margin:0 auto;
    background:pink;
}

#main {
    float:left;
    width:490px;
    background:#90EE90;
    padding:10px;
}

#sidebar {
    float:right;
    width:230px;
    background:#FAFAD2;
    padding:10px;
}

#footer {
    clear:both;
    background:#D8BFD8;
    padding:5px 10px;
}

#navigation {
    padding:5px 10px;
    background:#40E0D0;
}

#navigation ul {
    margin:0;
    padding:0;
    list-style:none;
}

#navigation li {
    display:inline;
    margin:0;
    padding:0;
}
    </style>
</head>

<body>
<div id="wrapper">
    <div id="header"><h4><b>Laporan Alat Rusak /Perbaikan Alat</b></h4></div>
    <div id="navigation">
    <ul>
        <li><a href="#">Menu 1</a></li>
        <li><a href="#">Menu 2</a></li>
        ...
    </ul>
    </div>
    <div id="main">
        <h2>Column 1</h2>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit...</p>
    </div>
    <div id="sidebar">
        <h2>Column 2</h2>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit...</p>
        <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            ...
        </ul>
    </div>
    <div id="footer">
        <p>Footer</p>
    </div>
</div>
</body>

</html>
















