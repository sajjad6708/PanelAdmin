@extends("admin.content.layouts.master")

@section("title","home")

@section("content")

    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">

                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Posts</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2">postCount</div>
                                </div>
                            </div>
                            <div id="chart-revenue-bg" class="chart-sm"></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Posts Visit</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2">postVisitCount</div>
                                </div>
                            </div>
                            <div id="chart-revenue-bg2" class="chart-sm"></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Comments</div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <div class="h1 mb-0 me-2">commentCount</div>
                                </div>
                            </div>
                            <div id="chart-revenue-bg3" class="chart-sm"></div>
                        </div>
                    </div>

              

             
                </div>
            </div>
        </div>
    </div>
@endsection
