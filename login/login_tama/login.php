<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>
    <center>
        <form action="loginController.php" method="POST" style="margin-top: 200px;">
            <h1>Login</h1>
            <label>Username :</label>
            <input type="text" name="username" placeholder="input username" required="" autofocus="">
            <br />
            <br />
            <label>Password :</label>
            <input type="password" name="password" placeholder="input password" required="" />
            <br />
            <br />

            <button type="submit">Submit Login</button>
        </form>
        <!--Menampung jika ada pesan -->
        <?php
        if (isset($_GET['pesan'])) { ?>
            <label style="color:red;">
                <?php echo $_GET['pesan']; ?>
            </label>
        <?php }  ?>
    </center>
</body>

</html>