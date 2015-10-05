<div class="articles">
    @forelse($articles as $article)
        @include('particles.article', [ 'article'=> $article, 'bio' => true])
    @empty
    	<p>找不到任何文章...</p>
    @endforelse
    @if($articles->hasPages())
        <div class="widget text-center">
            {!! $articles->render() !!}
        </div>
    @endif
</div>