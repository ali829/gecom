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
    <div class=" max-w-sm my-3  mx-auto  ">
        <div class="border border-gray-900 my-3">
            <p class="grand-titre text-center">
                Contact Us
            </p>
            <form class=" p-5  mx-auto">
                <div class="flex justify-center">
                    <div class="mb-2 mx-2">
                        <label class="label-form" for="password">
                            First name
                        </label>
                        <input class="input-form w-full" id="password" type="text"
                            placeholder=" your first name">
                        
                    </div>
                    <div class="mb-2 mx-2">
                        <label class="label-form" for="password">
                            Last name
                        </label>
                        <input class="input-form w-full" id="password" type="text"
                            placeholder=" your last name">
                        
                    </div>
                </div>
                <div class="my-3">
                    <label class="label-form" for="name">
                        Adresse e-mail
                    </label>
                    <input class="input-form w-full" id="name" type="text" placeholder="Your mail">
                </div>
        
                <div class="my-3">
                    <label class="label-form" for="username">
                        Phone
                    </label>
                    <input class="input-form w-full" id="username" type="text" placeholder="Your phone">
                </div>
                <div class="mb-3">
                    <label class="label-form" for="E-mail">
                        Subject
                    </label>
                    <input class="input-form w-full" id="E-mail" type="email" placeholder="What is ur subject ?">
                </div>
                <div class="mb-3">
                    <label class="label-form" for="n° Telephone">
                        Message
                    </label>
                    <textarea cols="20" rows="6" style="resize: none;" class="input-form border-2  w-full" id="telephone" type="text" placeholder="Write ur message here">
                    </textarea>
                </div>
               
                <div class="mt-3">
                    <button class="buttons" type="button">
                        <i class="material-icons mr-2">
                            send
                        </i>
                        Send
                    </button>
                </div>
                
            </form>
        </div>
        <p class="grand-titre text-center ">
            Other Way 
        </p>
        
        <div class=" flex justify-between border-2 border-gray-900">
            <div class="w-1/2">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3297.4905241331453!2d-6.586122649389529!3d34.2615417140235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda759c1d2495129%3A0xb8f0cb0b33bb9305!2sT-land%20space!5e0!3m2!1sfr!2sma!4v1576840993411!5m2!1sfr!2sma" class="w-full" frameborder="" style="border:1px;" allowfullscreen=""></iframe>
            </div>
            <div class="w-1/2 p-2">
                <div class="flex items-center my-2">
                    <i class="material-icons mr-1 text-sm">
                        my_location
                    </i> 
                    <span>
                        <a href="#" class="label-form">
                            Adresse locale 1 City , Contry
                        </a>
                    </span>
                    
                        
                    
                </div>
                <div class="flex items-center my-2">
                    <i class="material-icons mr-1 text-sm">
                        email
                    </i>
                    <span >
                        <a href="#" class="label-form">
                            contact@store.com
                        </a>
                    </span>
                </div>
                <div class="flex items-center my-2">
                    <i class="material-icons mr-1 text-sm">
                        phone
                    </i>
                    <span>
                        <a href="#" class="label-form">
                            +212 6 88 111 333
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
