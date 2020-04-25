<li>
  <img src={{gravator_for($user, ['size'=>50])}}>
  <a href="{{route('users.show', compact('user'))}}">{{$user->name}}</a>
  @auth
  @if (Auth::user('admin') && Auth::id() !== $user->id)
  <form action="{{route('users.destroy', compact('user'))}}" method="post" class="delete">
    @method('DELETE')
    @csrf
    |<button type="submit" value="delete" onclick="return confirm('You sure?')">delete</button>
  </form>
  @endif
  @endauth
</li>