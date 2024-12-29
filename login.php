<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<style>
    .a1 {
        display: grid;
        grid-auto-flow: column;
    }

    .a2 {
        color: rgb(192, 134, 192);
        background-color: #eecce5;
        background-size: cover;
        background-repeat: no-repeat;
        text-align: center;
        color: rgb(255, 255, 255);
    }

    .a3 {
        width: 70%;
        height: 70%;
        background-color: transparent;
        border-radius: 5px;
        border: 2px solid rgb(67, 58, 58);
    }

    .a4 {
        width: 70%;
        height: 70%;
    }

    .a5 {
        font-size: 100%;
    }

    .a6 {
        width: 350px;
        height: auto;
        padding: 20px 10px;
        background-color: rgba(216, 123, 190, 0.68);
        margin: auto;
        border-radius: 5px;
        border: 2px solid rgb(67, 58, 58);
    }

    .a7 {
        width: 70%;
        height: 70%;
        background-color: rgba(216, 123, 190, 0.68);
        margin: auto;
        border-radius: 5px;
        border: 2px solid rgb(67, 58, 58);
    }

    .a8 {
        background-color: rgba(203, 30, 191, 0.756);
        color: white;
    }

    input {
        padding: 10px;
    }
</style>

<body class="a2">
    <h1 style="text-align: center; color: rgb(67, 58, 58);">Reservasi</h1>
    <div class="a6">
        <form action="function.php" method="post">
            <h2 style="text-align:center;">Sign in to your account</h2>
            <div>
                <label for="fname" class="a5">Your email:</label> <br>
                <input type="text" id="fname" name="email" class="a3"> <br>
            </div>
            <div>
                <label for="lname" class="a4">Password</label> <br>
                <input type="password" id="fname" name="password" class="a7"> <br>
            </div> <br>
            <form>
                <input type="checkbox" id="vehicle1" name="vehicle1">
                <label for="vehice1">Remember me</label>
                <a href="#">Forgot Password</a>
                <div> <br>
                    <input type="submit" name="submit" value="Sign In" style="text-align: center;" class="a8"> <br>
                    <a href="register.php">Dont have an account yet? Sign Up</a>
                </div>
            </form>
    </div>
</body>

</html>