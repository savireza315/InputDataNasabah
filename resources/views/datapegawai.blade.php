<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INPUT WEB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
      <h1 class = "text-center">Data Test</h1>
      <div class ="container">
      <a href = "/tambahpegawai" class="btn btn-success">Tambah</a>
      <div class = "row">
        @if($message = Session::get('Success'))
        <div class="alert alert-success" role="alert">
          {{ $message }}
        </div>
        @endif
          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Name</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Number Telephone</th>
                      <th scope="col">Date</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$row->Name}}</td>
                        <td>{{$row->jenisKelamin}}</td>
                        <td>0{{$row->telephone}}</td>
                        <td>{{$row->created_at->format('D M Y')}}</td>
                        <td>
                            <a href = "/tampildata/{{$row->id}}" class="btn btn-info">Edit</a>
                            <a href = "#" class="btn btn-danger delete" data-id="{{$row->id}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
  <script>
    $('.delete').click(function() {
              var pid = $(this).attr('data-id');
              swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
                if (willDelete) {
                  window.location = "/deletedata/"+pid+""
                  swal("Your file has been deleted!", {
                    icon: "success",
                  });
                } else {
                  swal("Your file is safe!");
                }
              });
    });
                
  </script>
</html>