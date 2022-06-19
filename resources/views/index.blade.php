@extends('layouts.app')
@section('content')
<div class="contanier"> 
    <div class="row">
        <div class="col-md-12"> 
            <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>E-Commerce</title>

      <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <!-- Font-awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    </head>
    <body>

        <div class="container" style="margin-top: 50px;">

            {{-- <h3 class="text-center text-danger"><b>Product Upload</b> </h3> --}}
            {{-- <a href="/create" class="btn btn-outline-success">Add New Post</a> --}}

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Cover</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>


                    @foreach ($posts as $post)
                 <tr>
                       <th scope="row">{{ $post->id }}</th>
                       <td>{{ $post->title }}</td>
                       <td>{{ $post->author }}</td>
                       <td>{{ $post->body }}</td>
                       <td><img src="cover/{{ $post->cover }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
                       
                       <td>
                        <a href="/edit/{{ $post->id }}" class="btn btn-info">Edit</a>
                           
                        <a href="/delete/{{ $post->id }}" class="btn btn-danger" onclick="return confirm('Are you sure?');" type="submit">Delete</a>
                        @method('delete')
                       </td>

                   </tr>
                   @endforeach

                </tbody>
              </table>
        </div>




    </body>
</html>

        </div>
    </div>
</div>
@endsection