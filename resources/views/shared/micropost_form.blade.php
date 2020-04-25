<form action="{{route('microposts.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  @include('shared.error_messages')
  <div class="field">
    <input type="hidden" name="user_id" value="{{$current_user->id}}">
    <textarea name="content" id="content" cols="30" rows="10" placeholder="Compose new micropost...">{{old('content')}}</textarea>
    <input type="submit" value="Post" class="btn btn-primary">
    <span class="picture">
      <input type="file" name="picture" id="micropost_picture">
    </span>
  </div>
</form>