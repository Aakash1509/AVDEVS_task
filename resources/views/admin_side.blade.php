<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD application</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
</head>
<body class="bg-light">
    <div class="p-3 mb-2 bg-dark text-white">
        <div class="container">
        <div class="h3">LARAVEL CRUD APPLICATION</div>
        </div>
    </div>
    <div class="container">
            <div class="row">
                <div class="col-md-12 text-right mb-3">
                    <a href="{{url('blogs/add')}}" class="btn btn-primary">ADD</a>
                </div>
                @if(Session::has('msg'))
                    <div class="col-md-12">
                        <div class="alert alert-success">{{Session::get('msg')}}</div>
                    </div>
                @endif

                @if(Session::has('errorMsg'))
                    <div class="col-md-12">
                        <div class="alert alert-danger">{{Session::get('msg')}}</div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Blogs/List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created</th>
                                <th width="100">Edit</th>
                                <th width="100">Delete</th>
                            </tr>
                            </thead>
                            @if($blogs)
                                @foreach($blogs as $blog)
                            <tr>
                                <td>{{$blog->id}}</td>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->content}}</td>
                                <td>{{$blog->created_at}}</td>
                                <td><a href="{{url('blogs/edit/'.$blog->id)}}" class="btn btn-primary">Edit</a></td>
                                <td><a href="#" onclick="deleteBlog({{$blog->id}});" class="btn btn-danger">Delete</a></td>
                            </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="6">Blogs not found</td>
                            </tr>
                            @endif
                            
                        </table>
                    </div>
                </div>
                </div>
            </div>
    </div>
    
</body>

<script type="text/javascript">
    function deleteBlog(id){
        if(confirm('Are you sure want to delete')){
            window.location.href='{{url('blogs/delete')}}/'+id;
        }
    }

</script>
</html>