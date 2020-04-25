<li id="micropost-{{ $micropost->id }}">
  <a href="{{ $micropost->user->id }}">
    <img src="{{ gravator_for($micropost->user, $options = ['size' => 50]) }}">
  </a>
  <span class="user">
    <a href="{{route('users.show', $micropost->user->id)}}">{{ $micropost->user->name }}</a>
  </span>
  <span class="content">
    {{ $micropost->content }}
    @if ($micropost->picture)
    <img src="{{ ('/images/'.$micropost->picture) }}">
    @endif
  </span>
  <span class="timestamp">
    Posted {{ $micropost->created_at->diffForHumans() }} ago.
    @if (Auth::id() === $micropost->user->id)
    <form action="{{route('microposts.destroy', $micropost->id)}}" method="post" class="delete">
      @method('delete')
      @csrf
      <button type="submit" onclick="return confirm('You sure?')">delete</button>
    </form>
    @endif
  </span>
</li>