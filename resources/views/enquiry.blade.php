<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Enquiry </title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Enquiry</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          </div>
        </div>
      </nav>
      <div class="container bg-body p-2 px-3">
        @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
        <h1 class="mt-1">
            Create New Enquiry
        </h1>
        <form class="col-md-8" action="{{url('/enquiry')}}" method="POST">
            @csrf
            <div class="mb-2">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Name" aria-describedby="nameHelp">
              @error('name')
                    <div class="text-danger ps-2">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-2">
                <label for="eamil" class="form-label">Email Id</label>
                <input type="text" name="email_id" class="form-control" id="eamil" placeholder="Email Id" aria-describedby="emailHelp">
                @error('email_id')
                    <div class="text-danger ps-2">{{ $message }}</div>
              @enderror
            </div>
              <div class="mb-4">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="tel" name="mobile_number" class="form-control" id="mobile" placeholder="Mobile Number" aria-describedby="mobileHelp">
                @error('mobile_number')
                    <div class="text-danger ps-2">{{ $message }}</div>
              @enderror
              </div>
              <div class="mb-3">
                <select class="form-select" name="state_id" id="state_id" aria-label="Default select example">
                    <option value="">Select States</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  @error('state_id')
                  <div class="text-danger ps-2">{{ $message }}</div>
            @enderror
              </div>
              <div class="mb-3">
                <select class="form-select" name="district_id" id="district_id" aria-label="Default select example">
                    <option value="" >Select District</option>

                  </select>
                  @error('district_id')
                  <div class="text-danger ps-2">{{ $message }}</div>
            @enderror
              </div>
            <div class="mb-2 form-check">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                @error('g-recaptcha-response')
                <div class="text-danger ps-2">{{ $message }}</div>
          @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script>
        $( document ).ready(function() {
            $.ajax({
                type:"GET",
                url:"{{url('states')}}",
                success:function(res){
                if(res){
                    $("#state_id").empty();
                    $("#state_id").append('<option>Select State</option>');
                    $.each(res,function(id ,item){
                    $("#state_id").append('<option value="'+ item.id+'">'+item.name+'</option>');
                    });

                }else{
                    $("#state_id").empty();
                }
                }
                });
        });

        $('#state_id').change(function(){

          const state_id =  $('#state_id').val();

            $.ajax({
                type:"GET",
                url:"{{url('district/?state_id=')}}"+state_id,
                success:function(res){
                if(res){
                    $("#district_id").empty();
                    $("#district_id").append('<option>Select State</option>');
                    $.each(res,function(id ,item){
                    $("#district_id").append('<option value="'+ item.id+'">'+item.name+'</option>');
                    });

                }else{
                    $("#state").empty();
                }
                }
                });
        });
      </script>
</body>
<script>

</script>
</html>
