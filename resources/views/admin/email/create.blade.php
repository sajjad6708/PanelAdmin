@extends('admin.layouts.master')

@section('title', 'users')

@section('content')
    <div class="container mt-4">
        <div class="w-100 bg-white p-3 rounded-3 shadow">
            <form action="{{ route('email.store') }}" method="post" class="w-full h-full">
                @csrf
                <div class="mt-0 flex justify-center items-center">
                    <h1 class="text-center">create new file</h1>
                </div>
                <div class="mt-3">
                    <label for="title" class="block text-[17px]">Subject:</label>
                    <input type="text" name="subject" id="subject" class="form-control mt-1" required>
                    @error('title')
                        <span class="invalid-feedback text-red-500 block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="mt-3">
                    <label for="title" class="block text-[17px]">Body :</label>
                    <input type="text" name="body" id="body" class="form-control mt-1" required>
                    @error('body')
                        <span class="invalid-feedback text-red-500 block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        create
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/select2/jquery.min.js') }}"></script>
    {{-- <script src="{{asset("assets/select2/select2.js")}}"></script> --}}

@endsection
