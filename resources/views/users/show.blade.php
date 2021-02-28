@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-3/12 bg-white p-6 rounded-lg ml-2 mr-2 justify-center">
      <div class="p-2">
        <a href="{{ route('users.show', $user->username)}}" class="font-medium text-blue-500">Profile</a>
      </div>
      <div class="p-2">
        <a href="{{ route('users.myposts', $user->username)}}" class="font-medium text-blue-500">My Posts</a>
      </div>
      <div class="p-2">
        <a href="" class="font-medium text-blue-500">Privacy & Security</a>
      </div>
      <div class="p-2">
        <a href="" class="font-medium text-blue-500">Logout</a>
      </div>
    </div>

    <div class="w-7/12 bg-white p-6 rounded-lg">
      @yield('usercontent')
    </div>
  
    <div class="w-2/12 bg-white p-6 rounded-lg ml-2 mr-2">
    </div>

  </div>
@endsection