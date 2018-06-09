@extends('layouts.back')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Messages</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ 'Topic: ' . $message->topic }}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row" style="margin-bottom:8px;">
                        <div class="col-lg-6">
                            <strong>Sender info</strong>
                            <ul class="list-unstyled">
                                <li><em>Name: </em>{{ $message->name }}</li>
                                <li><em>Email: </em>{{ $message->email }}</li>
                            </ul>
                        </div>
                    </div>

                    <strong>Body</strong>
                    <p>{{ $message->body }}</p>
                    <a href="mailto:{{ $message->email }}" class="btn btn-success" style="float:right">Reply</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection