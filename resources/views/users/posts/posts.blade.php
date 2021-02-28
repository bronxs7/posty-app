@extends('users.show')

@section('usercontent')
  
    <h1 class="text-2xl font-medium mb-1">&commat;{{ $user->username }}</h1>
    <p class="mb-5">Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count())}} and received {{ $user->receivedLikes->count() }} likes</p>
 

  
    @if ($posts->count())
      @foreach ($posts as $post)
        <x-post :post="$post" />
      @endforeach

      {{ $posts->links() }}
    @else
      <p>{{ $user->name }} doest not have any posts</p>
    @endif
  
@endsection