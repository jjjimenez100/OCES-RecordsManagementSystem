<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login - OCES</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php
            require 'partials/stylesheets.php';
        ?>
    </head>

    <body>
        <?php
            require 'partials/header.php';
        ?>
        <div class="container text-center" id="form_padding">
                <form>
                    <table cellpadding="4" style="margin-left: auto; margin-right: auto;">
                        <tr>
                            <td>USERNAME</td>
                            <td><input type="text" placeholder=" username" style="border-radius: 5px"></td>
                        </tr>
                        <tr>
                            <td>PASSWORD</td>
                            <td><input type="password" placeholder=" password" style="border-radius: 5px"></td>
                        </tr>
                    </table>
                </form>
                <br>
                <button type="submit" class="btn" id="btn_login">LOGIN</button>
        </div>
    <a href="test.php?id=1">HI THERE!</a>
    </body>

    <?php
        require ('partials/scripts.php');
    ?>
</html>
