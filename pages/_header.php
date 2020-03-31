<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Andrea Rufo Router</title>

    <style media="screen">
        *{
            margin: 0;
            padding: 0;
            font-family: monospace;
        }

        .container{
            margin: auto;
            width: 960px;
        }

        ul#menu > li{
            display: inline-block;
            padding: 1rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <ul id="menu">
            <li><a href="/">Home</a></li>
            <li><a href="/about-me">About</a></li>
            <li><a href="/foo">Foo</a></li>
            <li><a href="/foo/andrea">Foo ?bar=andrea</a></li>
            <li><a href="/foo/federico">Foo ?bar=federico</a></li>
            <li><a href="/bar">Bar</a></li>
            <li><a href="/test">Test</a></li>
            <li><a href="/imanerro">Error 404</a></li>
        </ul>

        <br><hr><br>
