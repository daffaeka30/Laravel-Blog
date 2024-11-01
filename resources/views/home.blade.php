@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Statistics') }}</div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body d-flex align-items-center">
                                    <i class="fas fa-file-alt fa-4x me-3"></i>
                                    <div>
                                        <h4 class="card-title mb-0">{{ __('Total Article') }}</h4>
                                        <p class="card-text">{{ $articleCount }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white">
                                <div class="card-body d-flex align-items-center">
                                    <i class="fas fa-check-circle fa-4x me-3"></i>
                                    <div>
                                        <h4 class="card-title mb-0">{{ __('Confirmed Article') }}</h4>
                                        <p class="card-text">{{ $confirmedArticleCount }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-warning text-white">
                                <div class="card-body d-flex align-items-center">
                                    <i class="fas fa-exclamation-triangle fa-4x me-3"></i>
                                    <div>
                                        <h4 class="card-title mb-0">{{ __('Unconfirmed Article') }}</h4>
                                        <p class="card-text">{{ $unconfirmedArticleCount }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>{{ __('Latest Article') }}</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Published At') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($articles as $article)
                                        <tr>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->category->name }}</td>
                                            <td>{{ $article->published_at }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No articles found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h3>{{ __('List Category') }}</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Total Article') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->total_articles }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

