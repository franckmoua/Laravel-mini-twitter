<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex items-center justify-center h-screen">
            <div class="form-floating">

                <h1 class="flex justify-center text-blue-500 ">Leave a Tweet!</h1>
                <form action="/timeline" method="POST">
                    @csrf
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="post"></textarea>
                    <br>
                    <br>
                        <button type="submit" class="tweet-button">Tweet</button>
                </form>
              </div>
        </div>
    </div>
       
    <div class="py-12" >
        <div class="flex items-center justify-center flex-col h-screen">
           
                <div class="grid grid-cols-1  gap-6 lg:gap-8">
                    @foreach($tweets as $tweet)
                    <div class="tweet-container">
                      @foreach($users as $user)
                        @if ($user->id == $tweet->user_id)
                          <div class="flex justify-between">
                            <a href="/user/{{$user->username}}/tweets">
                              <p class="username">{{$user->username}}</p>
                            </a>
                            <p>{{$tweet->created_at->diffForHumans()}}</p>
                          </div>
                        @endif
                      @endforeach
                      <p>{{$tweet->post}}</p>
                      @if ($tweet->user_id == Auth::user()->id)
                        <form action="/timeline/{{$tweet->id}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="delete">Delete</button>
                        </form>
                      @endif
                    </div>
                  @endforeach
    </div>
    {{ $tweets->onEachSide(5)->links('') }}
</div>
    
<style>
.tweet-container {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
  }
  
  .username{
    color: cornflowerblue;
  }

  .delete{
    color:crimson;
  }

  .tweet-button{
    color:#1DA1F2;
    border:2px black;
    border-radius: 50%;
  }

  </style>
</x-app-layout>
