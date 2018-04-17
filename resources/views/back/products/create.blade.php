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
                            <div id="divCategory">
                                {!! Form::number('categories_amt', 1,['id' => 'categories_amt', 'class' => 'hidden']) !!}
                                <div class="form-group">
                                    {!! Form::label('category_id1', 'Category/Categories') !!}
                                    {!! Form::select('category_id1', $categoriesSelect, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <a href="#" onclick="event.preventDefault(); addCategory('divCategory')">Add Category</a>
                            &nbsp;
                            <a href="#" onclick="event.preventDefault(); removeCategory()">Remove Category</a>
                            <div class="form-group pt-4">
                                {!! Form::label('price', 'Price') !!}
                                {!! Form::number('price', null,['class' => 'form-control','step'=>'0.01']) !!}
                            </div>

                            <div id="divColor">
                                {!! Form::number('colors_amt', 1,['id' => 'colors_amt', 'class' => 'hidden']) !!}
                                <div class="form-group">
                                    {!! Form::label('color_id1', 'Color(s)') !!}
                                    {!! Form::select('color_id1', $colorsSelect, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <a href="#" onclick="event.preventDefault(); addColor('divColor')">Add Color</a>
                            &nbsp;
                            <a href="#" onclick="event.preventDefault(); removeColor()">Remove Color</a>



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
        var colorCounter = 1;
        var colorLimit = 3;
        var categoryCounter = 1;
        var categoryLimit = 3;

        function addColor(divName){
            if (colorCounter == colorLimit)  {
                alert("You have reached the limit of adding " + colorCounter + " colors");
            }
            else {
                var newdiv = document.createElement('div');
                newdiv.classList.add("form-group");
                result = "<select id='color_id" + (colorCounter+1) + "' name='color_id" + (colorCounter+1) + "' class='form-control'>";
                @foreach($colorsSelect as $key=>$value)
                    result = result.concat("<option value='{{$key}}'>{{$value}}</option>");
                @endforeach
                    result = result.concat("</select>");
                newdiv.innerHTML = result;
                document.getElementById(divName).appendChild(newdiv);
                colorCounter++;
                $('#colors_amt').attr('value', colorCounter);
            }
        }
        function removeColor(){
            if(colorCounter == 1){
                alert("You have to pick at least 1 color");
            }else{
                id = '#color_id' + colorCounter;
                amt = '#colors_amt';

                $(id).remove();
                colorCounter--;
                $(amt).attr('value', colorCounter);
            }
        }

        function addCategory(divName){
            if (categoryCounter == categoryLimit)  {
                alert("You have reached the limit of adding " + categoryCounter + " categories");
            }
            else {
                var newdiv = document.createElement('div');
                newdiv.classList.add("form-group");
                result = "<select id='category_id" + (categoryCounter+1) + "' name='category_id" + (categoryCounter+1) + "' class='form-control'>";
                @foreach($categoriesSelect as $key=>$value)
                    result = result.concat("<option value='{{$key}}'>{{$value}}</option>");
                @endforeach
                    result = result.concat("</select>");
                newdiv.innerHTML = result;
                document.getElementById(divName).appendChild(newdiv);
                categoryCounter++;
                $('#categories_amt').attr('value', categoryCounter);
            }
        }
        function removeCategory(){
            if(categoryCounter == 1){
                alert("You have to pick at least 1 category");
            }else{
                id = '#category_id' + categoryCounter;
                amt = '#categorys_amt';

                $(id).remove();
                categoryCounter--;
                $(amt).attr('value', categoryCounter);
            }
        }
    </script>
@endsection