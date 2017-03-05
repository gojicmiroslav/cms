<!DOCTYPE html>
<html>
    <head>
        <title>Show post</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Post ID: {{ $post->id }}</h1>
        <h2>Post title: {{ $post->title }}</h2>
        <h2>My name is: {{ $post->content }}</h2>
    </body>
</html>
