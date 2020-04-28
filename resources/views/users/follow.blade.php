<form action="{{route('relationships.store')}}" method="post">
  @csrf
  <div><input type="hidden" name="followed_id" value="{{$user->id}}"></div>
  <input type="submit" class="btn btn-primary" value="Follow">
</form>