<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Dependent AJAX Dropdown Tutorial</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Ajax Validation</title>


    <style>
        body{
            margin: auto;
            width: 50%;
        }
        body h1{margin:auto;width: 70%; margin-top: 40px; margin-bottom: 20px;}
    </style>

    </head>
    <body>
        <h1>Ajax Validation Form</h1>
        <form id="frm">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="User Name">User Name</label>
                    <input type="name"  class="form-control" name="name" placeholder="Enter User Name" >
                </div>
              <div class="form-group col-md-6">
                <label for="Email">Email</label>
                <input type="email" class="form-control"  name="email" placeholder="Email" >
              </div>
              <div class="form-group col-md-6">
                <label for="Password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" >
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCountry">Country</label>
                    <select id="country" class="form-control">
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option  value="{{$country->id}}">{{ $country->country_name }}</option>
                         @endforeach
                    </select>
                  </div>
                <div class="form-group col-md-4">
                  <label for="inputState">State</label>
                  <select id="state" class="form-control">
                  </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCity">City</label>
                    <select id="city" class="form-control">
                    </select>
                  </div>
              </div>

            <button type="submit" id="submit" class="btn btn-primary">Form Submit</button>
          </form>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                // var idCountry = $(this).val();
                // console.log(idCountry);

                $.ajax({
                    url: "{{ route('stateData') }}",
                    type: "POST",
                    data: {
                        country_id: $(this).val(),
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state').html('<option value="">Select State</option>');
                        $.each(result['states'], function (key, value) {
                        // console.log(value['state_name']);
                            $("#state").append('<option value="' + value
                            .id + '">' + value['state_name'] + '</option>');
                        });
                    }
                });
            });
            $('#state').on('change', function () {
                var idState = this.value;
                $.ajax({
                    url: "{{ route('cityData') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city").append('<option value="' + value
                                .id + '">' + value['city_name'] + '</option>');
                        });
                    }
                });
            });
        });
    </script>


    </body>
</html>





