<?php 
require_once 'phpLogin/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style the forms */
        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style the form headers */
        h2 {
            margin-top: 0;
            font-weight: bold;
            color: #333;
        }

        /* Style the form labels */
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #666;
        }

        /* Style the form inputs */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            
            height: 40px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style the form buttons */
        input[type="submit"] {
            width: 100%;
            height: 40px;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        /* Style the error messages */
        .error {
            color: #f00;
            font-size: 14px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <form action="phpLogin/login.php" method="post">
        <h2>Login</h2>
        <label for="email">Email:</label>
        <input type="email" id="email" name="user_email">
        <label for="pass">Password:</label>
        <input type="password" id="pass" name="user_pass">
        <input type="submit" name="login" value="Login">
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
    </form>


</body>

</html>