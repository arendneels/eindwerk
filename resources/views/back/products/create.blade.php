@extends('layouts.back')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">

                            <!-- Form -->
                            {!! Form::open(['method' => 'POST', 'action' => ['back\ProductController@store']]) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Product Name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('article_no', 'Article No.') !!}
                                {!! Form::text('article_no', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', 'Price') !!}
                                {!! Form::number('price', null,['class' => 'form-control','step'=>'0.01']) !!}
                            </div>

                            <div id="divName">
                                {!! Form::number('colors_amt', 1,['id' => 'colors_amt', 'class' => 'hidden']) !!}
                                <div class="form-group">
                                    {!! Form::label('color_id1', 'Color(s)') !!}
                                    {!! Form::select('color_id1', $colorsSelect, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <a href="#" onclick="event.preventDefault(); addInput('divName')">Add Test</a>


                            <div class="form-group">
                                {!! Form::submit('Create Product', ['class' => 'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        <!-- /Form -->

                            <!-- Errors -->
                            @if($errors->all())
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                        @endif
                        <!-- /Errors -->

                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection

@section('scripts')
    <script>
        var counter = 1;
        var limit = 3;
        function addInput(divName){
            if (counter == limit)  {
                alert("You have reached the limit of adding " + counter + " inputs");
            }
            else {
                var newdiv = document.createElement('div');
                newdiv.classList.add("form-group");
                result = "<select name='color_id" + (counter+1) + "' class='form-control'>";
                @foreach($colorsSelect as $key=>$value)
                    result = result.concat("<option value='{{$key}}'>{{$value}}</option>");
                @endforeach
                    result = result.concat("</select>")
                    newdiv.innerHTML = result;
                document.getElementById(divName).appendChild(newdiv);
                counter++;
                $('#colors_amt').attr('value', counter);
            }
        }
    </script>
@endsection