@php
$count = $current_user->load('microposts')->microposts()->count();
@endphp
<a href="{{route('users.show', $current_user->id)}}">
  <img src="{{gravator_for($current_user, ['size' => 50])}}">
</a>
<h1>{{ $current_user->name }}</h1>
<span>
  <a href="{{ route('users.show', $auth_id) }}">view my profile</a>
</span>
@if ($count > 1)
<span>{{ $count }} microposts</span>
@else
<span>{{ $count }} micropost</span>
@endif