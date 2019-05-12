<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * header.php
 * Created by PhpStorm.
 * Created at 1205.2019 14:10 as part of test project
 * @author    : ikalaushin
 *
 * @var string $title
 * @var string $description
 * @var string $keywords
 *
 */

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?=$title?></title>
        <meta name="title" content="<?=$title?>">
        <meta name="description" content="<?=$description?>">
        <meta name="keywords" content="<?=$keywords?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha256-HAaDW5o2+LelybUhfuk0Zh2Vdk8Y2W2UeKmbaXhalfA=" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha256-Y1rRlwTzT5K5hhCBfAFWABD4cU13QGuRN6P5apfWzVs=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container min-vh-100 bg-light pb-4 pt-5">
            <header class=" fixed-top text-light bg-dark">
                <ul class="container nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <?= anchor(
                            'vk',
                            'Форма поиска',
                            ['class'=> 'nav-link bg-secondary text-light ' . (uri_string() == '' || uri_string() == 'vk' || uri_string() == 'vk/index' || uri_string() == 'vk/form' ? 'active' : '')]
                        )?>
                    </li>
                </ul>
            </header>
