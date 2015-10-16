<div class="articles">
    @forelse($articles as $article)
        @include('particles.article', [ 'article'=> $article, 'bio' => true])
    @empty
    	<p>找不到任何文章...</p>
    @endforelse
</div>
<div class="clearfix"></div>
<div class="widget widget-pagination">
    @if($articles->hasPages())
        <div class="text-center">
            {!! $articles->render() !!}
        </div>
    @endif
</div>