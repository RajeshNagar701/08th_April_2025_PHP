@extends('admin.layout.structure')

@section('content')

    <!--  Main wrapper -->
    <div class="body-wrapper">
     
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Add service</h5>
              <div class="card">
                <div class="card-body">
                  <form action="{{url('/services')}}" method="post" enctype="multipart/form-data">
                    @csrf
      

                     <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Service Name</label>
                      <input type="name" name="ser_name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>


                    <div class="mb-3">
                      
                      <label for="exampleInputEmail1" class="form-label">Category Name</label>
                      <select type="name" name="cate_id"  class="form-control">
                        <option value=""> select category</option>
                        @foreach($category as $data)
                         <option value="{{$data->id}}"> {{$data->cate_name}}</option>
                         @endforeach

                        
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"> Description  </label>
                       <textarea  name="ser_description"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                    </div>
                     <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Main Price</label>
                      <input type="number" name="main_price"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">dis_price</label>
                       <input type="number" name="dis_price"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                     
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">service Image</label>
                      <input type="file" name="ser_img" class="form-control" id="exampleInputPassword1">
                    </div>

                    
                   
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
        
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
 @endsection