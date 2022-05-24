<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
</head>
    <body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
        <section class="bg-white">
            <div class="container mx-auto flex items-center flex-wrap pt-2 pb-12">
                {{ $slot }}
            </div>
        </section>
    </body>
</html>