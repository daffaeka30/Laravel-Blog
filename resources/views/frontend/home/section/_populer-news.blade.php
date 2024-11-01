<!-- Most Populer News Start -->
<div class="container-fluid populer-news py-5">
    <div class="container py-5">
        <div class="tab-class mb-4">
            <div class="row g-4">
                <div class="col-lg-8 col-xl-9">
                    <div class="d-flex flex-column flex-md-row justify-content-md-between border-bottom mb-4">
                        <h1 class="mb-4">What’s New</h1>
                        <ul class="nav nav-pills d-inline-flex text-center">
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 bg-light rounded-pill active me-2" data-bs-toggle="pill"
                                    href="#tab-1">
                                    <span class="text-dark" style="width: 100px;">Program</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark" style="width: 100px;">Trend</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 100px;">Romance</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-4">
                                    <span class="text-dark" style="width: 100px;">Drama</span>
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a class="d-flex py-2 bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-5">
                                    <span class="text-dark" style="width: 100px;">Laravel</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- Tab 1 Program --}}
                    <div class="tab-content mb-4">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                @foreach ($articleSingleProgram as $articleprogram)
                                <div class="col-lg-8">
                                    <div class="position-relative rounded overflow-hidden">
                                        <img src="{{ asset('storage/images/' . $articleprogram->image) }}"
                                            class="img-zoomin img-fluid rounded w-100" alt="">
                                        <div class="position-absolute text-white px-4 py-2 bg-primary rounded"
                                            style="top: 20px; right: 20px;">
                                            {{ $articleprogram->category->name }}
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <a href="{{ route('articles.show', $articleprogram->slug) }}" class="h4">{{ $articleprogram->title }}</a>
                                    </div>
                                    <div class="justify-content-between">
                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-user-edit"></i> {{ $articleprogram->user->name }}</a>
                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> {{ $articleprogram->views }} Views</a>
                                        <a href="#" class="text-dark link-hover float-end"><i class="fa fa-calendar-alt"></i> {{ $articleprogram->published_at }}</a>
                                    </div>
                                    <p class="my-4">{{ Str::limit($articleprogram->content, 100, '...') }}</p>
                                </div>
                                @endforeach

                                <div class="col-lg-4">
                                    <div class="row g-4">
                                        @foreach ($articleByProgram as $program)
                                            <div class="col-12">
                                                <div class="row g-4 align-items-center">
                                                    <div class="col-5">
                                                        <div class="overflow-hidden rounded">
                                                            <img src="{{ asset('storage/images/' . $program->image) }}"
                                                                class="img-zoomin img-fluid rounded w-100"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="features-content d-flex flex-column">
                                                            <p class="text-uppercase mb-2">{{ $program->category->name }}</p>
                                                            <a href="{{ route('articles.show', $program->slug) }}" class="h6">{{ $program->title }}</a>
                                                            <small class="text-body d-block"><i
                                                                    class="fas fa-calendar-alt me-1"></i>
                                                                {{ $program->published_at }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Tab 2 Trend --}}
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @foreach ($articleSingleTrend as $articletrend)
                                <div class="col-lg-8">
                                    <div class="position-relative rounded overflow-hidden">
                                        <img src="{{ asset('storage/images/' . $articletrend->image) }}"
                                            class="img-zoomin img-fluid rounded w-100" alt="">
                                        <div class="position-absolute text-white px-4 py-2 bg-primary rounded"
                                            style="top: 20px; right: 20px;">
                                            {{ $articletrend->category->name }}
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <a href="{{ route('articles.show', $articletrend->slug) }}" class="h4">{{ $articletrend->title }}</a>
                                    </div>
                                    <div class="justify-content-between">
                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-user-edit"></i> {{ $articletrend->user->name }}</a>
                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> {{ $articletrend->views }} Views</a>
                                        <a href="#" class="text-dark link-hover float-end"><i class="fa fa-calendar-alt"></i> {{ $articletrend->published_at }}</a>
                                    </div>
                                    <p class="my-4">{{ Str::limit($articletrend->content, 100, '...') }}</p>
                                </div>
                                @endforeach

                                <div class="col-lg-4">
                                    <div class="row g-4">
                                        @foreach ($articleByTrend as $trend)
                                        <div class="col-12">
                                            <div class="row g-4 align-items-center">
                                                <div class="col-5">
                                                    <div class="overflow-hidden rounded">
                                                        <img src="{{ asset('storage/images/' . $trend->image) }}"
                                                            class="img-zoomin img-fluid rounded w-100" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="features-content d-flex flex-column">
                                                        <p class="text-uppercase mb-2">{{ $trend->category->name }}</p>
                                                        <a href="{{ route('articles.show', $trend->slug) }}" class="h6">{{ $trend->title }}</a>
                                                        <small class="text-body d-block"><i
                                                                class="fas fa-calendar-alt me-1"></i> {{ $trend->published_at }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tab 3 Romance --}}
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @foreach ($articleSingleRomance as $articleromance)
                                <div class="col-lg-8">
                                    <div class="position-relative rounded overflow-hidden">
                                        <img src="{{ asset('storage/images/' . $articleromance->image) }}"
                                            class="img-zoomin img-fluid rounded w-100" alt="">
                                        <div class="position-absolute text-white px-4 py-2 bg-primary rounded"
                                            style="top: 20px; right: 20px;">
                                            {{ $articleromance->category->name }}
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <a href="{{ route('articles.show', $articleromance->slug) }}" class="h4">{{ $articleromance->title }}</a>
                                    </div>
                                    <div class="justify-content-between">
                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-user-edit"></i> {{ $articleromance->user->name }}</a>
                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> {{ $articleromance->views }} Views</a>
                                        <a href="#" class="text-dark link-hover float-end"><i class="fa fa-calendar-alt"></i> {{ $articleromance->published_at }}</a>
                                    </div>
                                    <p class="my-4">{{ Str::limit($articleromance->content, 100, '...') }}</p>
                                </div>
                                @endforeach

                                <div class="col-lg-4">
                                    <div class="row g-4">
                                        @foreach ($articleByRomance as $romance)
                                        <div class="col-12">
                                            <div class="row g-4 align-items-center">
                                                <div class="col-5">
                                                    <div class="overflow-hidden rounded">
                                                        <img src="{{ asset('storage/images/' . $romance->image) }}"
                                                            class="img-zoomin img-fluid rounded w-100" alt="{{ $romance->title }}">
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="features-content d-flex flex-column">
                                                        <p class="text-uppercase mb-2">{{ $romance->category->name }}</p>
                                                        <a href="{{ route('articles.show', $romance->slug) }}" class="h6">{{ $romance->title }}</a>
                                                        <small class="text-body d-block"><i
                                                                class="fas fa-calendar-alt me-1"></i> {{ $romance->published_at }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tab 4 Drama --}}
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @foreach ($articleSingleDrama as $articledrama)
                                <div class="col-lg-8">
                                    <div class="position-relative rounded overflow-hidden">
                                        <img src="{{ asset('storage/images/' . $articledrama->image) }}"
                                            class="img-zoomin img-fluid rounded w-100" alt="">
                                        <div class="position-absolute text-white px-4 py-2 bg-primary rounded"
                                            style="top: 20px; right: 20px;">
                                            {{ $articledrama->category->name }}
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <a href="{{ route('articles.show', $articledrama->slug) }}" class="h4">{{ $articledrama->title }}</a>
                                    </div>
                                    <div class="justify-content-between">
                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-user-edit"></i> {{ $articledrama->user->name }}</a>
                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> {{ $articledrama->views }} Views</a>
                                        <a href="#" class="text-dark link-hover float-end"><i class="fa fa-calendar-alt"></i> {{ $articledrama->published_at }}</a>
                                    </div>
                                    <p class="my-4">{{ Str::limit($articledrama->content, 100, '...') }}</p>
                                </div>
                                @endforeach

                                <div class="col-lg-4">
                                    <div class="row g-4">
                                        @foreach ($articleByDrama as $drama)
                                        <div class="col-12">
                                            <div class="row g-4 align-items-center">
                                                <div class="col-5">
                                                    <div class="overflow-hidden rounded">
                                                        <img src="{{ asset('storage/images/' . $drama->image) }}"
                                                            class="img-zoomin img-fluid rounded w-100" alt="{{ $drama->title }}">
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="features-content d-flex flex-column">
                                                        <p class="text-uppercase mb-2">{{ $drama->category->name }}</p>
                                                        <a href="{{ route('articles.show', $drama->slug) }}" class="h6">{{ $drama->title }}</a>
                                                        <small class="text-body d-block"><i
                                                                class="fas fa-calendar-alt me-1"></i> {{ $drama->published_at }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tab 5 Laravel --}}
                        <div id="tab-5" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @foreach ($articleSingleLaravel as $articlelaravel)
                                <div class="col-lg-8">
                                    <div class="position-relative rounded overflow-hidden">
                                        <img src="{{ asset('storage/images/' . $articlelaravel->image) }}"
                                            class="img-zoomin img-fluid rounded w-100" alt="">
                                        <div class="position-absolute text-white px-4 py-2 bg-primary rounded"
                                            style="top: 20px; right: 20px;">
                                            {{ $articlelaravel->category->name }}
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <a href="{{ route('articles.show', $articlelaravel->slug) }}" class="h4">{{ $articlelaravel->title }}</a>
                                    </div>
                                    <div class="justify-content-between">
                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-user-edit"></i> {{ $articlelaravel->user->name }}</a>
                                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> {{ $articlelaravel->views }} Views</a>
                                        <a href="#" class="text-dark link-hover float-end"><i class="fa fa-calendar-alt"></i> {{ $articlelaravel->published_at }}</a>
                                    </div>
                                    <p class="my-4">{{ Str::limit($articlelaravel->content, 100, '...') }}</p>
                                </div>
                                @endforeach

                                <div class="col-lg-4">
                                    <div class="row g-4">
                                        @foreach ($articleByLaravel as $laravel)
                                        <div class="col-12">
                                            <div class="row g-4 align-items-center">
                                                <div class="col-5">
                                                    <div class="overflow-hidden rounded">
                                                        <img src="{{ asset('storage/images/' . $laravel->image) }}"
                                                            class="img-zoomin img-fluid rounded w-100" alt="{{ $laravel->title }}">
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="features-content d-flex flex-column">
                                                        <p class="text-uppercase mb-2">{{ $laravel->category->name }}</p>
                                                        <a href="{{ route('articles.show', $laravel->slug) }}" class="h6">{{ $laravel->title }}</a>
                                                        <small class="text-body d-block"><i
                                                                class="fas fa-calendar-alt me-1"></i> {{ $laravel->published_at }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Most Views News --}}
                    <div class="border-bottom mb-4">
                        <h2 class="my-4">Most Views Articles</h2>
                    </div>
                    <div class="whats-carousel owl-carousel owl-theme">
                        @foreach ($popular_articles as $popuarticle)
                        <div class="latest-news-item">
                            <div class="bg-light rounded">
                                <div class="rounded-top overflow-hidden">
                                    <img src="{{ asset('storage/images/' . $popuarticle->image) }}"
                                        class="img-zoomin img-fluid rounded-top w-100" alt="{{ $popuarticle->title }}">
                                </div>
                                <div class="d-flex flex-column p-4">
                                    <a href="{{ route('articles.show', $popuarticle->slug) }}" class="h4">{{ $popuarticle->title }}</a>
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="small text-body link-hover">by {{ $popuarticle->user->name }}</a>
                                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i> {{ $popuarticle->published_at }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Other Category --}}
                    <div class="mt-5 lifestyle">
                        <div class="border-bottom mb-4">
                            <h1 class="mb-4">You Might Also Like</h1>
                        </div>
                        <div class="row g-4">
                            @foreach ($random_articles as $random)
                            <div class="col-lg-6">
                                <div class="lifestyle-item rounded">
                                    <img src="{{ asset('storage/images/' . $random->image) }}"
                                        class="img-fluid w-100 rounded" alt="">
                                    <div class="lifestyle-content">
                                        <div class="mt-auto">
                                            <a href="{{ route('articles.show', $random->slug) }}" class="h4 text-white link-hover">{{ $random->title }}</a>
                                            <div class="d-flex justify-content-between mt-4">
                                                <a href="#" class="small text-white link-hover">By {{ $random->user->name }}</a>
                                                <small class="text-white d-block"><i
                                                        class="fas fa-calendar-alt me-1"></i> {{ $random->published_at }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Stay Connected --}}
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="p-3 rounded border">
                                <h4 class="mb-4">Stay Connected</h4>
                                <div class="row g-4">
                                    <div class="col-12">
                                        <a href="#"
                                            class="w-100 rounded btn btn-primary d-flex align-items-center p-3 mb-2">
                                            <i
                                                class="fab fa-facebook-f btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">13,977 Fans</span>
                                        </a>
                                        <a href="#"
                                            class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-2">
                                            <i class="fab fa-twitter btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">21,798 Follower</span>
                                        </a>
                                        <a href="#"
                                            class="w-100 rounded btn btn-warning d-flex align-items-center p-3 mb-2">
                                            <i class="fab fa-youtube btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">7,999 Subscriber</span>
                                        </a>
                                        <a href="#"
                                            class="w-100 rounded btn btn-dark d-flex align-items-center p-3 mb-2">
                                            <i
                                                class="fab fa-instagram btn btn-light btn-square rounded-circle me-3"></i>
                                            <span class="text-white">19,764 Follower</span>
                                        </a>
                                    </div>
                                </div>

                                {{-- Popular Article --}}
                                <h4 class="my-4">Popular Articles</h4>
                                <div class="row g-4">
                                    @foreach ($popular_articles as $popular)
                                        <div class="col-12">
                                            <div class="row g-4 align-items-center features-item">
                                                <div class="col-4">
                                                    <div class="rounded-circle position-relative">
                                                        <div class="overflow-hidden rounded-circle">
                                                            <img src="{{ asset('storage/images/' . $popular->image) }}"
                                                                class="img-zoomin img-fluid rounded-circle w-100"
                                                                alt="{{ $popular->title }}">
                                                        </div>
                                                        <span
                                                            class="rounded-circle border border-2 border-white bg-primary btn-sm-square text-white position-absolute"
                                                            style="top: 10%; right: -10px;">{{ $popular->views }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="features-content d-flex flex-column">
                                                        <p class="text-uppercase mb-2">{{ $popular->category->name }}
                                                        </p>
                                                        <a href="{{ route('articles.show', $popular->slug) }}"
                                                            class="h6">
                                                            {{ $popular->title }}
                                                        </a>
                                                        <small class="text-body d-block"><i
                                                                class="fas fa-calendar-alt me-1"></i>
                                                            {{ $popular->published_at }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="col-lg-12">
                                        <a href="{{ route('articles.index') }}"
                                            class="link-hover btn border border-primary rounded-pill text-dark w-100 py-3 mb-4">View
                                            More</a>
                                    </div>

                                    {{-- Trending Tags --}}
                                    <div class="col-lg-12">
                                        <div class="border-bottom my-3 pb-3">
                                            <h4 class="mb-0">Trending Tags</h4>
                                        </div>
                                        <ul class="nav nav-pills d-inline-flex text-center mb-4">
                                            @foreach ($tags as $item)
                                                <li class="nav-item mb-3">
                                                    <a class="d-flex py-2 bg-light rounded-pill me-2"
                                                        href="{{ route('frontend.tag', $item->slug) }}">
                                                        <span class="text-dark link-hover"
                                                            style="width: 90px;">#{{ $item->name }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    {{-- Banner --}}
                                    <div class="col-lg-12">
                                        <div class="position-relative banner-2">
                                            <img src="{{ asset('assets/frontend') }}/img/banner-2.jpg"
                                                class="img-fluid w-100 rounded" alt="">
                                            <div class="text-center banner-content-2">
                                                <h6 class="mb-2">The Most Populer</h6>
                                                <p class="text-white mb-2">News & Magazine WP Theme</p>
                                                <a href="#" class="btn btn-primary text-white px-4">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Most Populer News End -->
