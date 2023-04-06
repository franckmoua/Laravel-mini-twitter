<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$user->username}}'s  {{ __('Profile') }}
        </h2>
    </x-slot>

    
       
    <div
  class="block max-w-sm rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700">
        <form>
        <div class="profile">
            <h1 class="name"><b>{{$user->name}}</b></h1>
            <h1><b>{{$tweets->count()}} Tweets</b></h1>
        </div>
        <div class="tweet-container">
        @foreach($tweets as $tweet)
        <div class="tweet-container">
        <p>{{$tweet->created_at->diffForHumans()}}</p>
        <p>{{$tweet->post}}</p>
        </div>
        @endforeach
    </div>
        </form>
    </div>
    

    <style>
        .tweet-container{
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
        .name{
            color:cornflowerblue
        }
    
    </style>
</x-app-layout>
