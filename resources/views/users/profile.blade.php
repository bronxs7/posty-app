@extends('users.show')

@section('usercontent')
  <h1 class="text-2xl font-medium">{{ $user->name }}</h1>
  <p class="mb-1">&commat;{{ $user->username }}</p>
  <p class="mb-3">Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count())}} and received {{ $user->receivedLikes->count() }} likes</p>

  <h3 class="text-l font-small mb-1">{{ $user->email }}</h3>
  <a href="{{ route('users.show', $user->username) }}" class="font-bold text-blue-500">Change Password</a>
@endsection