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
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Service Name</label>
                      <select type="name" name="ser_name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Service Description  </label>
                      <input type="name" name="ser_description"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                     <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Main Price</label>
                      <input type="number" name="price"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Product Description</label>
                      <textarea  name="description"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Product Image</label>
                      <input type="file" name="image" class="form-control" id="exampleInputPassword1">
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