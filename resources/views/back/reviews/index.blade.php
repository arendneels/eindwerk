@extends('layouts.back')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reviews</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(isset($category))
                        Showing all products of category:
                        {{ $category->name }}
                    @else
                        All reviews
                    @endif
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Product</th>
                            <th>Rating</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th id="sort">Validated</th>
                            <th id="controls" style="width:150px;">Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{ $review->user->first_name . " " . $review->user->last_name}}</td>
                                <td><a href="{{ route('productdetail', $review->product_id) }}">{{ $review->product->name }}</a></td>
                                <td>{{ $review->rating }}</td>
                                <td>{{ $review->title }}</td>
                                <td>{{ $review->body }}</td>
                                <td>{{ $review->validated ? "Yes" : "No" }}</td>
                                <td class="row">
                                    <div class="col-sm-6">
                                        @if(!$review->validated)
                                        <a class="btn btn-primary" href="{{ route('review.validate', $review->id) }}">Validate</a>
                                        @endif
                                    </div>
                                    <!-- Form -->
                                {!! Form::open(['method' => 'DELETE', 'action' => ['back\ReviewController@destroy', $review->id], 'class' => 'col-sm-6']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
                                {!! Form::close() !!}
                                <!-- /Form -->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@section('scripts')
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(function(){
            //Make datatable resposive
            $('#dataTables-example').DataTable({
                responsive: true
            });

            //Make controls column smaller
            $('#dataTables-example').on( 'column-sizing.dt', function ( e, settings ) {
                $('#controls').css('width',150);
            });

            //Delete button alert
            $('.delete').click(function(){
                return confirm("Are you sure you want to delete this?")
            });

            //Sort by id="sort" default
            $('#sort').click();
        });
    </script>
@endsection