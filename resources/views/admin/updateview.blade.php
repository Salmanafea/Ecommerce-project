
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
  @include('admin.css')
  <style class='text/css'>
    .title{
      color:white;
       padding-top:25px;
       font-size:25px;
    }
    label{
      display: inline-block;
      width:200px;
    }

    </style>


  </head>
  <body>


      <!-- partial -->
      @include('admin.sidebar')
      @include('admin.navbar')


        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class='container' align='center'>
                <h1 class="title">Add Product</h1>


                @if (session()->has('message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert"></button>
                {{session()->get('message')}}
            </div>


                @endif


                <form action="{{url('updateproduct',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                <div style='padding:15px;'>
                    <label >Product title</label>
                    <input style="color:black;" type="text" value="{{$data->title}}" name="title"  required>
                </div>

                <div style='padding:15px;'>
                    <label >Price</label>
                    <input style="color:black;" type="number" value="{{$data->price}}" name="price"  required>
                </div>

                <div style='padding:15px;'>
                    <label >Description</label>
                    <input style="color:black;" type="text" value="{{$data->description}}" name="des"  required>
                </div>

                <div style='padding:15px;'>
                    <label>Quantity</label>
                    <input style="color:black;" type="text" value="{{$data->quantity}}" name="quantity"  required>
                </div>
                <div style='padding:15px;'>
                    <label>Old Image</label>
                    <img height="100px" width="100" src="/productimage/{{$data->image}}">
                </div>

                <div style='padding:15px;'>
                    <label >Change the image</label>
                    <input type="file" name="file">
                </div>

                <div style='padding:15px;'>
                    <input class="btn btn-success" type="submit">
                </div>
            </form>


            </div>

        </div>


          <!-- partial -->

    @include('admin.script')
  </body>
</html>
