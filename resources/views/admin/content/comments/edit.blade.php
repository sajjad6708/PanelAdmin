@extends("admin.layouts.master")

@section("title", "comment")

@section("content")
<div class="container mt-4" xmlns="http://www.w3.org/1999/html">
    <div class="w-100 bg-white p-3 rounded-3 shadow">
        <form action="{{ route("comments.update",$comment?->id) }}" method="post" class="w-full h-full">
            @csrf
            @method("PUT")
            <div class="mt-0 flex justify-center items-center">
                <h1 class="text-center">edit comment {{ $comment?->id }}</h1>
            </div>
            <div class="mt-3">
                <label for="user_name" class="d-block text-[17px]">user name :</label>
                <input type="text" name="user_name" id="user_name"
                       class="form-control"
                       required value="{{ $comment?->user_name }}">
                @error("user_name")
                <span class="invalid-feedback text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="avatar" class="d-block text-[17px]">avatar :</label>
                <input type="text" name="avatar" id="avatar"
                       class="form-control"
                       required value="{{ $comment?->avatar }}">
                @error("avatar")
                <span class="invalid-feedback text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="content" class="d-block text-[17px]">content :</label>
                <textarea name="content" id="content" cols="30" rows="6"
                          class="form-control"
                          required>{{ $comment?->content }}</textarea>
                @error('content')
                <span class="invalid-feedback text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="parent_id" class="d-block text-[17px]">
                    parent comment :
                </label>
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="{{ $comment?->parent_id }}" selected>{{ $comment?->parent?->user_name }}</option>
                </select>
                @error('parent_id')
                <span class="invalid-feedback  text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="post_id" class="d-block text-[17px]">
                    post :
                </label>
                <select name="post_id" id="post_id" class="form-control">
                    <option value="{{ $comment?->post_id }}" selected>{{ $comment?->post?->title }}</option>
                </select>
                @error('post_id')
                <span class="invalid-feedback  text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <button type="submit"
                        class="btn btn-primary">
                    create
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section("scripts")
    <script src="{{ asset("assets/select2/jquery.min.js") }}"></script>
    <script src="{{ asset("assets/select2/select2.js") }}"></script>
    <script>
        $('#parent_id').select2({
            multiple: false,
            ajax: {
                url: '{{ route("get-comments") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return {
                                id: item.id,
                                text: item.user_name
                            };
                        })
                    };
                },
                cache: true
            },
            minimumInputLength: 1
        });
        $('#post_id').select2({
            multiple: false,
            ajax: {
                url: '{{ route("get-posts") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return {
                                id: item.id,
                                text: item.title
                            };
                        })
                    };
                },
                cache: true
            },
            minimumInputLength: 1
        });
    </script>
@endsection
