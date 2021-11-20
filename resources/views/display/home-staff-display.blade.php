@extends('home.home')

@section('content')


    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                @if (Session::has('name'))
                    <h1 class="fw-bolder">Welcome {{ Session::get('name') }}!</h1>
                @endif

                <p class="lead mb-0">You logged in as staff. You can add or edit product in this page</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">

                <!-- Nested row for non-featured blog posts-->
                <div class="row">

                    @foreach ($items as $item)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!">
                                    <img class="card-img-top" src="{{ $item->image_url }}" alt="{{ $item->name }}"
                                        width="700" height="250" />
                                </a>
                                <div class="card-body">
                                    <h2 class="card-title h4">{{ $item->name }}</h2>
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-edit"
                                        data-id="{{ $item->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- Pagination-->

                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <ul class="pagination justify-content-center my-4">
                        {!! $items->links('pagination::bootstrap-4') !!}
                    </ul>
                </nav>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..."
                                aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Add New Product</div>
                    <div class="card-body">
                        <button class="btn btn-primary form-control" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Add Product</a>

                    </div>
                </div>
                
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('submit-items-staff') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Title:</label>
                                <input type="text" class="form-control" id="recipient-name" name="title">
                            </div>
                            <div class="form-group">
                                <label for="qty" class="col-form-label">Qty:</label>
                                <input type="text" class="form-control" id="qty" name="qty">
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/x-png,image/jpeg"
                                        id="customFileLang" name="image">
                                    <label class="custom-file-label" for="customFileLang">Choose File</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal edit-->
        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('edit-items-staff') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" id="id-text" name="id">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Title:</label>
                                <input type="text" class="form-control" id="name-text" name="name">
                            </div>
                            <div class="form-group">
                                <label for="qty-text" class="col-form-label">Qty:</label>
                                <input type="text" class="form-control" id="qty-text" name="qty">
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/x-png,image/jpeg"
                                        id="customFileEdit" name="image">
                                    <label class="custom-file-label" for="customFileEdit">Choose File</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <img id="image-edit" class="img-fluid" alt="test-image" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        
    </div>

@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#modal-edit').on('show.bs.modal', event => {
                let itemId = $(event.relatedTarget).data('id');

                let url = window.location.href;
                let lastIndex = url.lastIndexOf("/");

                let baseUrl = url.substring(0, lastIndex);

                $.ajax({
                    url: `${baseUrl}/api/product-by-id/${itemId}`,
                    type: "GET",
                    success: ((data) => {
                        console.log(data);
                        $('#id-text').val(data.id);
                        $('#name-text').val(data.name);
                        $('#qty-text').val(data.qty);
                        $('#image-edit').attr('src', data.image_url);
                    }),
                    cache: false,
                    contentType: false,
                    processData: false,
                });

            });

            $('#customFileLang').on('change', function() {
                var fileName = $(this).val();
                $(this).next('.custom-file-label').html(fileName);
            });
            $('#customFileEdit').on('change', function() {
                var fileName = $(this).val();
                $(this).next('.custom-file-label').html(fileName);
            });
            
        });
    </script>

@endsection
