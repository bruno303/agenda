<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agenda Online</title>

        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">

    </head>
    <body>
        <br/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xm-12">
                    <nav class="navbar navbar-inverse" role="navigation">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="/">Agenda Online</a>
                        </div>
                        
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <?php if( $_SESSION['user']['is_admin'] == true ){ ?><li><a href="/admin">Admin</a></li><?php } ?>
                                <li class="dropdown">
                                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options<strong class="caret"></strong></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/logout">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>