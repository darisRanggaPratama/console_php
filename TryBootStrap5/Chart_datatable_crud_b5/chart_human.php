<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee</title>
    <!-- Load library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Load library Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- CSS Style -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 style="text-align:center">Employee</h1>
    <div class="container">
        <form action="chart_human.php" method="GET">
            <?php
            require_once "chart_form.php";
            ?>
        </form>
    </div>
    <br>
    <br>
    <!-- Create canvas to display chart -->
    <canvas id="chartContainer"></canvas>

    <!-- Script to create chart -->
    <script type="text/javascript">
        <?php
        require_once "js/ct_human.php";
        ?>
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>