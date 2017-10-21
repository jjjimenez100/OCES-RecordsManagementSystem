<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login - OCES</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="resources/css/bootstrap.css">
        <link rel="stylesheet" href="resources/css/style.css">
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
    </body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="resources/js/bootstrap.min.js" ></script>
</html>
