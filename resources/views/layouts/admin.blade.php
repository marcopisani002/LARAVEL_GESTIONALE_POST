<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>

    @vite('resources/js/app.js')
</head>
<body class="my-bdy">

    {{-- header --}}

    <main>
        <div class="container">

            <a href="/posts">HOME</a>
            <a href="/posts/create">CREATE</a>
            @yield("content")
        </div>
    </main>

    {{-- footer --}}

</body>
</html>
