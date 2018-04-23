@extends('layouts.back')

@section('styles')
    <link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Product</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Product Info
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
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
                    <div class="row">
                        <!-- Form -->
                        {!! Form::model($product, ['method' => 'PATCH', 'action' => ['back\ProductController@update', $product->id]]) !!}
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('article_no', 'Article No.') !!}
                                {!! Form::text('article_no', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', 'Product Name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('price', 'Price') !!}
                                {!! Form::number('price', null,['class' => 'form-control', 'step'=>'0.01', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Description') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="divCategory">
                                {!! Form::number('categories_amt', $product->categories->count(),['id' => 'categories_amt', 'class' => 'hidden']) !!}
                                @foreach($product->categories as $key => $category)
                                    <div class="form-group">
                                        @if($key == 0)
                                            {!! Form::label('category_id1', 'Category/Categories') !!}
                                        @endif
                                        {!! Form::select('category_id' .($key+1), $categoriesSelect, $category->id,['id' => 'category_id' . ($key+1), 'class' => 'form-control', 'onclick' => 'setSizes()']) !!}
                                    </div>
                                @endforeach
                            </div>
                            <a href="#" onclick="event.preventDefault(); addCategory('divCategory')">Add Category</a>
                            &nbsp;
                            <a href="#" onclick="event.preventDefault(); removeCategory()">Remove Category</a>

                            <div id="divColor" class="pt-4">
                                {!! Form::number('colors_amt', $product->colors->count(),['id' => 'colors_amt', 'class' => 'hidden']) !!}
                                @foreach($product->colors as $key => $color)
                                    <div class="form-group">
                                        @if($key == 0)
                                            {!! Form::label('color_id1', 'Color(s)') !!}
                                        @endif
                                        {!! Form::select('color_id' .($key+1), $colorsSelect, $color->id,['id' => 'color_id' . ($key+1), 'class' => 'form-control']) !!}
                                    </div>
                                @endforeach
                            </div>
                            <a href="#" onclick="event.preventDefault(); addColor('divColor')">Add Color</a>
                            &nbsp;
                            <a href="#" onclick="event.preventDefault(); removeColor()">Remove Color</a>

                            <div class="form-group pt-4">
                                <p><strong>Available Sizes&nbsp;</strong><span id="sizeUnit">{{$product->sizeUnits()? $product->sizeUnits() : ""}}</span></p>
                                <div id="sizes" style="margin-bottom: 16px; border:1px solid #ccc; border-radius:5px; padding-top:5px; padding-left:10px; max-width:300px;">
                                    @foreach($currentSizes as $currentSize)
                                        <span style="margin-right:10px;">
                                            <input class="sizesInput" name="sizes[]" type="checkbox" value="{{ $currentSize->id }}"{{ in_array($currentSize->id, $sizes) ? " checked" : ""}}><label>{{ $currentSize->name }}</label>
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <div id="image_info">
                                <input id="imageCounter" name="images_amt" type="number" class="hidden" value="0">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <p><strong>Current Image(s)</strong></p>
                                    <div class="row">
                                        @foreach($product->photos()->orderBy('id', 'asc')->get() as $photo)
                                            <div class="col-sm-2 text-center">
                                                <img src="{{ $photo->path() }}" alt="" style="max-width:100%; height:70px;">
                                                <br>
                                                <div style="margin-top:20px;">
                                                    <label for="thumbnail{{ $loop->iteration }}">Thumb</label>
                                                    <br>
                                                    <input id="thumbnail{{ $loop->iteration }}" type="radio" name="thumbnail" value="{{ $photo->id }}" {{ $photo->thumbnail ? "checked" : ""}}>
                                                </div>
                                                <div style="margin-top:8px;">
                                                    <label for="deleteImg{{ $loop->iteration }}">Delete</label>
                                                    <br>
                                                    <input id="deleteImg{{ $loop->iteration }}" type="checkbox" name="delete[]" value="{{ $photo->id }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                {!! Form::submit('Edit Product', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    <!-- /Form -->
                    </div>
                    <!-- /.row (nested) -->
                    <div class="row" style="margin-bottom:1rem;">
                        <div class="col-sm-10 col-sm-offset-1">
                            <p><strong>Upload Images</strong> (max: {{ 4-$product->photos->count() }})</p>
                            <form id="myDrop" class="dropzone">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
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
    <!--Dropzone-->
    <script src="{{ asset('js/dropzone.min.js') }}"></script>


    <script>
        //Create dropzone
        // Disable the auto init. So we can modify settings first. We will manually initialize it later.
        Dropzone.autoDiscover = false;

        var imageCounter = 0;

        // imageUpload portion is the camelized version of our HTML elements ID. ie <div id="image-upload"> becomes imageUpload.
        Dropzone.options.myDrop = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            maxFiles: 4 - {{ $product->photos->count() }},
            parallelUploads: 2, //limits number of files processed to reduce stress on server
            accept: function(file, done) {
                done();
            },
            sending: function(file, xhr, formData) {
                // Pass token. You can use the same method to pass any other values as well such as a id to associate the image with for example.
                formData.append("_token", $("[name=_token]").val()); // Laravel expect the token post value to be named _token by default
            },
            init: function() {
                this.on("success", function(file, response) {
                    imageCounter++;
                    $('#imageCounter').attr('value', imageCounter);
                    console.log(response);
                    console.log(imageCounter);
                    input = $(document.createElement('input'));
                    input.addClass('hidden');
                    input.attr('type','text');
                    input.attr('name','photo_name'+imageCounter);
                    console.log(response.photo_name);
                    input.attr('value', response.photo_name);
                    $('#image_info').append(input);
                });
            },
        };

        // Create dropzone
        var myDropzone = new Dropzone("#myDrop", {
            url: '{{ route('dropzone') }}'
        });

        //Add/remove select options for many to many relationships
        var colorCounter = {{ $product->colors->count() }};
        var colorLimit = 3;
        var categoryCounter = {{ $product->categories->count() }};
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
                var id = '#color_id' + colorCounter;
                var amt = '#colors_amt';

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
                result = "<select id='category_id" + (categoryCounter+1) + "' name='category_id" + (categoryCounter+1) + "' class='form-control' onchange='setSizes()'>";
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
                var id = '#category_id' + categoryCounter;
                var amt = '#categorys_amt';

                $(id).remove();
                categoryCounter--;
                $(amt).attr('value', categoryCounter);
            }
        }

        //Sizes
        var regularSizes = '';
        var shoeSizes = '';
        var kidSizes = '';
        var currentSizes = 'regular';

        @foreach($regularSizes as $regularSize)
            regularSizes = regularSizes.concat('<span style="margin-right:12px;"><input class="sizesInput" name="sizes[]" type="checkbox" value="{{ $regularSize->id }}">' +
            '<label>{{ $regularSize->name }}</label></span>');
        @endforeach;
        @foreach($shoeSizes as $shoeSize)
            shoeSizes = shoeSizes.concat('<span style="margin-right:12px;"><input class="sizesInput" name="sizes[]" type="checkbox" value="{{ $shoeSize->id }}">' +
            '<label>{{ $shoeSize->name }}</label></span>');
        @endforeach;
        @foreach($kidSizes as $kidSize)
            kidSizes = kidSizes.concat('<span style="margin-right:12px;"><input class="sizesInput" name="sizes[]" type="checkbox" value="{{ $kidSize->id }}">' +
            '<label>{{ $kidSize->name }}</label></span>');
        @endforeach;

        $('form').submit(function(){
            if($( '.sizesInput:checked' ).length == 0) {
                return confirm("This product will not show up in stock because no sizes are selected, are you sure you want to proceed? (Sizes can be added later via the Edit Product page.)")
            }
        });

        function categoriesHasShoes(){
            var cat_amt = $('#categories_amt').val();
            for(i = 1; i <= cat_amt; i++){
                if($('#category_id' + i).val() == 4){
                    return true;
                }
            }
            return false
        }

        function categoriesHasKids(){
            var cat_amt = $('#categories_amt').val();
            for(i = 1; i <= cat_amt; i++){
                if($('#category_id' + i).val() == 3){
                    return true;
                }
            }
            return false
        }

        //Function for sizes
        function setSizes() {
            if (categoriesHasShoes() && currentSizes != 'shoes') {
                currentSizes = 'shoes';
                $('#sizeUnit').html('(EU Shoe Size)');
                return $('#sizes').html(shoeSizes);
            }
            if (categoriesHasKids() && !categoriesHasShoes() && currentSizes != 'kids') {
                currentSizes = 'kids';
                $('#sizeUnit').html('(Age)');
                return $('#sizes').html(kidSizes);
            }
            if (!categoriesHasShoes() && !categoriesHasKids() && currentSizes != 'regular') {
                currentSizes = 'regular';
                $('#sizeUnit').html('');
                return $('#sizes').html(regularSizes);
            }
        }
    </script>
@endsection