<?php function template_header()
{ ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title><?php print constant('PAGE_TITLE'); ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>

        <header>
            My Header
        </header>


        <nav>
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
        </nav>


    <?php } ?>


    <?php function template_footer()
    { ?>

        <footer>
            Copyright Info
        </footer>


        <script src="#"></script>
    </body>

    </html>
<?php } ?>

<?php function loginFormTemplate()
{ ?>
    <form action="process_registration_form.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php } ?>