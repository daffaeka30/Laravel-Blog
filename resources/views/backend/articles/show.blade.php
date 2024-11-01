@extends('layouts.app')

@section('title', 'Article: ' . $article->title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <x-card icon="newspaper" title="Detail Article: {{ $article->title }}" class="card-responsive">
                    
                    @session('success')
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ session('success') }}
                        </div>
                    @endsession

                    <div class="table-responsive-sm overflow-x-auto">
                        <table class="table table-striped table-bordered" id="yajra" width="100%">
                            <tr>
                                <th>Title</th>
                                <td>{{ $article->title }}</td>
                            </tr>

                            <tr>
                                <th>Slug</th>
                                <td>{{ $article->slug }}</td>
                            </tr>

                            <tr>
                                <th>Category</th>
                                <td>{{ $article->category->name }}</td>
                            </tr>

                            <tr>
                                <th>Tag</th>
                                <td>
                                    @foreach ($article->tags as $tag)
                                        <span class="badge bg-secondary">{{ $tag->name }}</span> <span class="mx-1"></span>
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <th>Content</th>
                                <td>{{ $article->content }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($article->published == 1)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-danger">Draft</span>
                                    @endif
                                </td>
                            </tr>

                            @if ($article->published_at)
                                <tr>
                                    <th>Published At</th>
                                    <td>{{ date('d-m-Y', strtotime($article->published_at)) }}</td>
                                </tr>
                            @endif

                            <tr>
                                <th>Views</th>
                                <td>{{ $article->views }}</td>
                            </tr>

                            <tr>
                                <th>Keywords</th>
                                <td>{{ $article->keywords }}</td>
                            </tr>

                            <tr>
                                <th>Image</th>
                                <td>
                                    <a href="{{ asset('storage/images/' . $article->image) }}" target="_blank"
                                        rel="noopener noreferrer">
                                        <img src="{{ asset('storage/images/' . $article->image) }}" width="200">
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <th>Author</th>
                                <td>{{ $article->user->name }}</td>
                            </tr>
                        </table>
                        <div class="float-end">
                            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary"> Back</a>
                            <a href="{{ route('admin.articles.edit', $article->uuid) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            @if (auth()->user()->hasRole('owner') && $article->deleted_at != null)
                                <a href="{{ route('admin.articles.restore', $article->uuid) }}" class="btn btn-warning"><i class="fas fa-undo"></i> Restore</a>

                                <button type="button" class="btn btn-danger" onclick="deleteForceData(this)" data-id="{{ $article->uuid }}"><i class="fas fa-trash-alt"></i> Force Delete</button>
                            @endif

                            @if (auth()->user()->hasRole('owner') && $article->is_confirm == 0)
                                <a href="{{ route('admin.articles.confirm', $article->uuid) }}" class="btn btn-success"><i class="fas fa-check"></i> Confirm</a>
                            @endif
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('assets/backend/library/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/backend/js/helper.js') }}"></script>
    <script src="{{ asset('assets/backend/js/article.js') }}"></script>
@endpush
