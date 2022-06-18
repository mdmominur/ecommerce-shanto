@extends('layouts.app')
@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-12"> 
                        <div class="container" style="margin-top: 50px;">
                            <div class="row">


                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <h3 class="text-center text-danger"><b>Add New Product</b> </h3>
                                    <div class="form-group">
                                        <form action="/post" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name *</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="title" value="" class="form-control"  placeholder="Enter Your Product Name"><br>   
                                        </div><br>   
                                            </div>

                                            <div class="form-group row"   >
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Author *</label>
                                                <div class="col-sm-10"> 

                                                <input type="text" name="author" class="form-control" placeholder="Enter product author name">  <br>    
                                                </div><br>  
                                            </div>
                                            <div class="form-group row"   >
                                                <label class="col-sm-2 col-form-label">Price</label>
                                                <div class="col-sm-10"> 

                                                <input type="text" name="price" class="form-control" placeholder="Enter product price">  <br>    
                                                </div><br>  
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-10">
                                                    <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="Enter Description "></Textarea>
                                                </div>
                                            </div>

                                        <label class="m-2">Cover Image</label>
                                        <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">

                                        <label class="m-2">Images</label>
                                        <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>

                                        <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                                        </form>
                                </div>
                                </div>
                            </div>



@endsection