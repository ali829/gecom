<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/7d92c4acd3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/node_modules/material-icons/iconfont/material-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <title>Store
    </title>
    <script src="https://kit.fontawesome.com/7d92c4acd3.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('css/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick/slick-theme.css')}}" />
</head>

<body>
    <div>
        <div class="max-w-sm mx-auto my-10 bg-white border border-gray-700 ">
            <div id="cnx" class=" my-5 mx-auto border-t border-gray-500 md:border-t-0 py-3 md:py-0 display">
                <p class="grand-titre text-center">
                    connextion
                </p>
                <form class="p-5 max-w-sm">
                    <div class="my-3">
                        <label class="label-form" for="username">
                            Username
                        </label>
                        <input class="input-form w-full" id="username" type="text" placeholder="Username">
                    </div>
                    <div class="my-3">
                        <label class="label-form" for="password">
                            Password
                        </label>
                        <input class="input-form w-full" id="password" type="password" placeholder="******************">
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
                    </div>

                    <div class="flex justify-end my-3">
                        <button class="buttons" type="button">
                            <i class="material-icons mr-2">
                                power_settings_new
                            </i>
                            Sign In
                        </button>
                    </div>
                    <div>
                        <a class="link-footer underline" href="#">
                            Did you forget password ?
                        </a>
                    </div>
                </form>
                <div class=" flex  items-center justify-end  ">
                    <p class="text-sm font-semibold">
                        Connect with :
                    </p>
                    <a href="">
                        <i class="fab fa-facebook mx-2 text-xl text-blue-500"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-google mx-2 text-xl text-yellow-500"></i>
                    </a>
                </div>
                <p class="text-xl font-light text-center my-3">
                    OR
                </p>
                <div class="flex justify-center my-3">
                    <button id="btn" class="buttons" type="button">
                        <i class="material-icons mr-2">
                            save
                        </i>
                        Register
                    </button>
                </div>
            </div>
            <div id="register" class=" md:border-r  my-5 mx-auto con ">
                <p class="grand-titre text-center">
                    Incription
                </p>
                <form class=" p-5 max-w-sm">
                    <div class="my-3">
                        <label class="label-form" for="name">
                            Name
                        </label>
                        <input class="input-form w-full" id="name" type="text" placeholder="Your Name">
                    </div>

                    <div class="my-3">
                        <label class="label-form" for="username">
                            Username
                        </label>
                        <input class="input-form w-full" id="username" type="text" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label class="label-form" for="E-mail">
                            E-mail
                        </label>
                        <input class="input-form w-full" id="E-mail" type="email" placeholder="Your E-mail">
                    </div>
                    <div class="mb-3">
                        <label class="label-form" for="n° Telephone">
                            Telephone
                        </label>
                        <input class="input-form w-full" id="telephone" type="text" placeholder="Your number telephone">
                    </div>
                    <div class="flex justify-center">
                        <div class="mb-2 mx-2">
                            <label class="label-form" for="password">
                                Password
                            </label>
                            <input class="input-form w-full" id="password" type="password"
                                placeholder="******************">
                            <p class="text-red-500 text-xs italic">Please choose a password.</p>
                        </div>
                        <div class="mb-2 mx-2">
                            <label class="label-form" for="password">
                                Confirmation
                            </label>
                            <input class="input-form w-full" id="password" type="password"
                                placeholder="******************">
                            <p class="text-red-500 text-xs italic">Please choose a password.</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="buttons" type="button">
                            <i class="material-icons mr-2">
                                settings_power
                            </i>
                            Sign up
                        </button>
                    </div>
                    <div class="mt-3 flex items-center justify-end">
                        <button class=" group " type="button">
                            <i class="material-icons mr-1 mt-1 text-sm font-bold group-hover:mr-2">
                                arrow_back
                            </i>
                            <span class="font-semibold group-hover:border-b-2 border-gray-900">
                                I have an account
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="py-5 absolute text-center w-full">
            <p class="text-center text-gray-500 text-xs">
                &copy;2019 twidlo. All rights reserved.
            </p>
        </div>
    </div>
</body>

<script>
    document.getElementById('btn').addEventListener("click", function () {
        var c, r;
        c = document.getElementById('cnx');
        r = document.getElementById('register');
        r.classList.add('display');
        r.classList.remove('con');
        c.classList.remove('display');
        c.classList.add('con');
    });

    document.getElementById('btnback').addEventListener("click", function () {
        var c, r;
        c = document.getElementById('cnx');
        r = document.getElementById('register');
        c.classList.toggle('con');
        c.classList.toggle('display');
        r.classList.toggle('con');
        r.classList.toggle('display');
    });

</script>

</html>
