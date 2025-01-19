<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
</html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿一覧
        </h2>
    </x-slot>
    <div class="container mx-auto mt-8">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">本文</th>
                    <th class="px-4 py-2">いいね</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $post->id }}</td>
                        <td class="px-4 py-2">{{ $post->body }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('post.like', $post) }}" method="POST">
                                @csrf
                                <button type="submit" class="{{ $post->followers->contains(auth()->user()) ? 'bg-red-500 hover:bg-red-700' : 'bg-blue-300 hover:bg-blue-700' }} text-white font-bold py-2 px-4 rounded">
                                    {{ $post->followers->contains(auth()->user()) ? 'いいね取り消し' : 'いいね' }}
                                </button>
                            </form>
                            {{ $post->followers->count() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>