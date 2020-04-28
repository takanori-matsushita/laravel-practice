<div class="row">
  <aside class="col-md-4">
    <section class="user_info">
      @include('shared.user_info')
    </section>
    <section class="stats">
      @include('shared.stats')
    </section>
    <section class="micropost_form">
      @include('shared.micropost_form')
    </section>
  </aside>
  <div class="col-md-8">
    <h3>Micropost Feed</h3>
    @include('shared.feed')
  </div>
</div>