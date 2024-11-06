<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
     @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          @if (session()->has('Success'))
              <div class="alert alert-success" role="alert">
                  {{ session('Success') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
          @endif
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">Daftar Post</h2>
          </div>
          <a href="/post_page" class="btn btn-primary">Tambah Post</a>
          <table class="table">
              <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Action</th>
              </tr>
              @foreach ($posts as $post)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $post->title }}</td>
                  <td>
                    <a href="/edit_page/{{ $post->id }}" class="btn btn-warning">Edit</a>
                      <form action="/post/{{ $post->id }}" style="display:inline" method="POST">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger" type="submit">
                              Delete
                          </button>
                      </form>
                  </td>
              </tr>
              @endforeach
          </table>
      </main>
      </div>
      @include('admin.footer')
    </div>
  </body>
</html>