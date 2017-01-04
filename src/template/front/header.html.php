<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl-PL">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8"/>
    <title>MVC</title>

</head>
<body>
<ul>
    <li><a href="<?php echo $this->generateUrl('category/add'); ?>">Dodaj kategorię</a></li>
    <li><a href="<?php echo $this->generateUrl('category/index'); ?>">Lista kategorii</a></li>
    <li><a href="<?php echo $this->generateUrl('article/add'); ?>">Dodaj artykuł</a>
    <li><a href="<?php echo $this->generateUrl('article/index'); ?>">Lista artykułów</a>
</ul>