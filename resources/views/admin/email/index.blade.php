@extends("admin.layouts.master")

@section("title","posts")

@section("content")
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Overview
          </div>
          <h2 class="page-title">
            Dashboard
          </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list">
            <span class="d-none d-sm-inline">
              {{-- <a href="#" class="btn">
                New view
              </a> --}}
            </span>
            <a href="{{ route('email.create') }}" class="btn btn-primary d-none d-sm-inline-block" >
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              Create new email notification
            </a>
            <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">Manage Eamils</div>
            <div class="card-body">
                {{-- <div class="row mb-3 d-flex justify-content-between align-items-center">
                    <div class="col-5 d-flex justify-content-center align-items-center">
                        <select id="filter-column" class="form-control w-100">
                            <option value="">Select Column</option>
                            <option value="id">Id</option>
                            <option value="title">Title</option>
                            <option value="description">Description</option>
                            <option value="thumbnail">Thumbnail</option>
                            <option value="user_id">User Id</option>
                            <option value="category_id">Category Id</option>
                            <option value="created_at">Created At</option>
                            <option value="updated_at">Updated At</option>
                        </select>
                    </div>
                    <div class="col-5 d-flex justify-content-center align-items-center">
                        <input type="text" id="filter-value" class="form-control w-100" placeholder="Enter Filter Value">
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center btn-width">
                        <button id="filter-button" class="btn btn-primary btn-width">Filter</button>
                    </div>
                </div> --}}
               

                <div class="table-responsive">
                    <table
		                      class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          
                          <th>Subjet</th>
                          <th>Body</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($emails as $email)
                        <tr>
                            <td >{{ $email->subject }}</td>
                            <td class="text-secondary" >
                             {{$email->body}}
                            </td>
                            <td>
                              <a  class="btn btn-warning"  href="{{ route('email.send' ,$email->id) }}">Send</a>
                            </td>
                          </tr>
                        @endforeach
                      
                   
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

@endsection
