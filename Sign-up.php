<?php
//include_once 'Room.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = new User;
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    if($user->signup()){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['User_name'] = $user->name;
        header('location: Dash.php');
    } else{
        echo 'User is unable to sign-in';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Auth Project</title>
</head>
<body>
<h1>Sign-up Form</h1>
<div class="row p-40 ml-40">
    <form class="w-full max-w-sm" action="Sign-up.php" method="POST">
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Name
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="Full Name">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                    Password
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password" placeholder="Password">
            </div>
        </div>
<!--        <div class="md:flex md:items-center mb-6">-->
<!--            <div class="md:w-1/3"></div>-->
<!--            <label class="md:w-2/3 block text-gray-500 font-bold">-->
<!--                <input class="mr-2 leading-tight" type="checkbox">-->
<!--                <span class="text-sm">-->
<!--              Confirm-->
<!--            </span>-->
<!--            </label>-->
<!--        </div>-->
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <a href="Dash.php"><button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Sign Up
                </button></a>
                <a href="Register.php"><button class="shadow bg-black hover:bg-white-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                        Register
                    </button></a>
            </div>
        </div>
    </form>
</div>
</body>
</html>