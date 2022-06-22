@extends('layouts.app')
@section('title', "$post->meta_title")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                    <a class="breadcrumb-item"
                        href="{{ url('tutorial/' . $post->category->slug) }}">{{ $post->category->name }}</a>
                    <span class="breadcrumb-item active" aria-current="page">{{ $post->name }}</span>
                </nav>
                <div class="post">
                    <div class="post-title">
                        <h2>{{ $post->name }}</h2>
                    </div>
                    <div class="card card-shadow mt-4">
                        <p class="p-3 mb-0">
                            <span class="me-2">Created On:</span>
                            <span>{{ $post->created_at->format('d M, Y') }}</span>
                        </p>
                        <div class="card-body">
                            <h4>{{ $post->description }}</h4>
                        </div>
                    </div>
                </div>
                <div class="comment-form mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Leave a comment</h4>
                            <form class="form-floating" action="{{ url('comments') }}" method="post">
                                @csrf
                                <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="comment_body" id="commentArea" placeholder="Type Your Comment"
                                        style="height: 100px"></textarea>
                                    <label for="commentArea">Type Your Comment</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="comments mt-4">
                    @forelse ($post->comments as $comment)
                        <div class="comment-card card mb-4">
                            <div class="card-body">
                                <h4 class="card-title">
                                    @if ($comment->user)
                                        {{ $comment->user->name }}
                                    @endif
                                </h4>
                                <p><small>Commented on: {{ $comment->created_at->format('d-m-Y') }}</small></p>
                                <p class="card-text">{{ $comment->comment_body }}</p>
                                @if (Auth::check() && Auth::id() == $comment->user->id)
                                    <div class="comment-controls">
                                        {{-- <a href="" class="btn btn-warning">Edit</a> --}}
                                        <button type="button" value="{{ $comment->id }}"
                                            class="btn btn-danger deleteComment">Delete</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <h3>No Comments!!!</h3>
                    @endforelse
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Latest Posts</div>
                    <div class="card-body">
                        @foreach ($latestPosts as $item)
                            <a href="{{ url('tutorial/' . $item->category->slug . '/' . $item->slug) }}">
                                <h6>{{ $item->name }}</h6>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.deleteComment', function() {
                // alert("Delete comment");
                if (confirm("Are you sure want to delete your comment!!")) {
                    var thisClicked = $(this);
                    var comment_id = thisClicked.val();

                    $.ajax({
                        type: "POST",
                        url: "/delete-comment",
                        data: {
                            "comment_id": comment_id
                        },
                        // dataType: int,
                        success: function(response) {
                            if (response.status == 200) {
                                thisClicked.closest('.comment-card').remove();
                                iziToast.show({
                                    title: 'Success',
                                    message: response.message,
                                    color: 'green',
                                });
                            } else {
                                iziToast.show({
                                    title: 'Error',
                                    message: response.message,
                                    color: 'red',
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
