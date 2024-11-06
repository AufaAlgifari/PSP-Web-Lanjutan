<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
    </style>
  </head>
  <body>
      @include('admin.header')
      <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
          <h1 class="post_title">Create Post</h1>
          <div class="container">
            <form action="{{ url('update_post/' . $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter post title" value="{{ old('title', $post->title) }}">
                </div>
                <div class="form-group">
                    <label for="description">Post Description</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="Enter post description">{{ old('description', $post->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Post Image</label>
                    <input type="file" name="image" class="form-control-file">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update Post">
                </div>
            </form>
            
          </div>
        </div>
      </div>
      @include('admin.footer')
  </body>
</html>
