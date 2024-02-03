@extends('layouts.app')

@section('content')
    <section>
        <div class="container mt-5">
            <h2 class="mb-4">All User Posts</h2>
            <form action="{{ route('posts.list') }}" method="POST" class="d-flex mb-3 w-50" id="filterForm">
                @csrf
                <div class="input-group">
                    <span class="input-group-text">Filter by Date</span>
                    <input type="date" class="form-control" name="filter_date" id="filter_date">
                </div>
                <button type="button" class="btn btn-primary mr-2" id="filterBtn">Search</button>
                <button type="button" class="btn btn-danger">Reset</button>

            </form>
            <table class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Date</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </section>
@endsection
@push('bottom_scripts')
    <script type="text/javascript">
        (function() {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('posts.list') }}",
                    data: function(d) {
                        d.filter_date = $('#filter_date').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },

                    {
                        data: 'img',
                        name: 'img',
                        render: function(data, type, full, meta) {
                            return '<img src="' + data +
                                '" alt="Image" class="img-thumbnail" width="50" height="50">';
                        }
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: {
                            _: 'display',
                            sort: 'timestamp'
                        }
                    },


                ],
            });
            $('#filterBtn').on('click', function() {
                table.ajax.reload();
            });
            $('#filterForm button.btn-danger').on('click', function() {
                $('#filter_date').val('');
                table.ajax.reload();
            });

        });
    </script>
@endpush
