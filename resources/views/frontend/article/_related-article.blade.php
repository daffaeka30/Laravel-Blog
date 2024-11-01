<div class="bg-light rounded my-4 p-4">
    <h4 class="mb-4">Related Articles</h4>
    <div class="row g-4">
        @forelse ($related_articles as $item)
            <div class="col-lg-6">
                <div class="bg-white rounded p-3">
                    <a href="{{ route('articles.show', $item->slug) }}" class="h5 mb-2">
                        <img src="{{ asset('storage/images/' . $item->image) }}" class="img-fluid rounded"
                            alt="{{ $item->title }}">
                    </a>
                    <p class="text-center mt-3 mb-0">
                        <a href="{{ route('articles.show', $item->slug) }}"
                            class="text-dark link-hover"><strong>{{ $item->title }}</strong></a>
                    </p>
                    <p class="text-center text-muted mt-2">
                        <small><i class="fa fa-calendar-alt"></i> {{ date('d M Y', strtotime($item->published_at)) }}</small>
                    </p>
                </div>
            </div>
        @empty
            <p class="text-center">No related article</p>
        @endforelse
    </div>
</div>