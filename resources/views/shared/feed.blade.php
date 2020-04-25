@if (!empty($feed_items))
<ol class="microposts">
  @each('components.micropost', $feed_items, 'micropost')
</ol>
{{ $feed_items->links() }}
@endif