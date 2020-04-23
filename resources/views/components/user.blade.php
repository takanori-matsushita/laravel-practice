<li>
  <img src={{gravator_for($user, ['size'=>50])}}>
  <a href="{{route('users.show', compact('user'))}}">{{$user->name}}</a>
  @auth
  @if (auth()->user()->admin === true && Auth::id() !== $user->id)
  <form action="{{route('users.destroy', compact('user'))}}" method="post" class="delete" style="display: inline">
    @method('DELETE')
    @csrf
    |<button type="submit" value="delete" onclick="return confirm('You sure?')">delete</button>
  </form>
  @endif
  @endauth
</li>