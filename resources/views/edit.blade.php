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
                    <a href="{{url('blogs')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Blogs/Edit</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{url('blogs/edit/'.$blog->id)}}" method="post" name="addBlog" id="addBlog">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" id="title" value="{{old('title',$blog->title)}}" class="form-control {{($errors->any() && $errors->first('title')) ? 'is-invalid' : ''}}">

                                @if($errors->any())
                                    <p class="invalid-feedback">{{$errors->first('title')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="content" id="content" cols="20" rows="15" class="form-control {{($errors->any() && $errors->first('content')) ? 'is-invalid' : ''}}">{{old('content',$blog->content)}}</textarea>
                                @if($errors->any())
                                    <p class="invalid-feedback">{{$errors->first('content')}}</p>
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary" >Save blog</button>
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 20px;">Update blog</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
    </div>
    
</body>
</html>