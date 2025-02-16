<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
</html>
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
            </div>
            <div class='content__URL'>
                <h2>URL</h2>
                <input type='text' name='post[url]' value="{{ $post->url }}">
            </div>
            <div class="image">
                <h2>画像</h2>
                <img src="{{ Storage::url($post->image)}}" width="500px">
                <input type="file" name="image" id="image">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>
