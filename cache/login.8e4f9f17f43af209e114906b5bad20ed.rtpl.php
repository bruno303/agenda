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
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form role="form" action="/login/" method="POST">
                        <div class="form-group">
                            <label for="inpLogin">Login</label>
                            <input type="text" class="form-control" name="inpLogin" required/>
                        </div>
                        <div class="form-group">
                            <label for="inpPassword">Password</label>
                            <input type="password" class="form-control" name="inpPassword" required/>
                        </div>
                        <p class="help-block">
                            <?php echo htmlspecialchars( $erro, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </p>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>