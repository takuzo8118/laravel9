<x-guest-layout>
    <div class="container bg-blue-100 m-auto">
        {{-- イメージ的にこんな感じかな --}}
        {{-- @foreach($posts as $post)
        <li>
            <img class="小さめに表示させるCSSを適用" src="{{ $post->image }}"
            <a href="{{ $post->id }}">タイトル:{{ $post->title }}</a>
            <textarea>{{ $post->body }}</textarea>
            グーグルマップへのリンクもいるような気もする
            それかここに表示するか考えること
        </li>
        @endforeach --}}
        <li><a href="#">投稿1</a></li>
        <li><a href="#">投稿2</a></li>
        <li><a href="#">投稿3</a></li>
    </div>
</x-guest-layout>
