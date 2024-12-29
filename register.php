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
            <h2 style="text-align:center;">Register Your Account</h2>
            <div>
                <label for="fmail" class="a5">Your email:</label> <br>
                <input type="text" required id="fmail" name="email" class="a3"> <br>
            </div>
            <div>
                <label for="fname" class="a5">Your Name</label> <br>
                <input type="text" required id="fname" name="name" class="a3"> <br>
            </div>
            <div>
                <label for="fphonenumber" class="a5">Phone Number</label> <br>
                <input type="tel" required id="fphonenumber" name="phonenumber" class="a3"> <br>
            </div>
            <div>
                <label for="fpassword" class="a4">Password</label> <br>
                <input type="password" required id="fpassword" name="password" class="a7"> <br>
            </div> <br>
            <div>
                <label for="fphonenumber" class="a5">Gender</label> <br>
                <select name="gender" id="">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <form>
                <div> <br>
                    <input type="submit" name="submit" value="Register" style="text-align: center;" class="a8"> <br>
                    <a href="login.php">Already have account ? Login </a>
                </div>
            </form>
    </div>
</body>

</html>