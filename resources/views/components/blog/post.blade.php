<div class="bg-white shadow">
  <a href="#">
    <h2 class="text-xl font-bold">{{ $post->title }}</h2>
    <p>{!! Str::limit($post->body, 200, '...') !!}</p>
  </a>
</div>
