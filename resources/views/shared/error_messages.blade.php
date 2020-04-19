@if ($errors->any())
<div id="error_explanation">
  <div class="alert alert-danger">
    @if (count($errors) == 1)
    The form contains 1 error
    @elseif (count($errors) > 1)
    The form contains {{count($errors)}} errors
    @endif
  </div>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif