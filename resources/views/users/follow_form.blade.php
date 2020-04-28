@auth
<div id="follow_form">

  @if (auth()->user()->is_following($user->id))
  @include('users.unfollow')
  @else
  @include('users.follow')
  @endif
</div>
@endauth