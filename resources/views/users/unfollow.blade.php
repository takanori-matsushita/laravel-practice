<form action="{{route('relationships.destroy', $user->id)}}" method="post">
  @csrf
  @method('delete')
  <div><input type="hidden" name="followed_id" value="{{$user->id}}"></div>
  <input type="submit" class="btn" value="Unfollow">
</form>