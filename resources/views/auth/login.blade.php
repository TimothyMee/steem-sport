

<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Steem-Sport">
    <meta name="keywords" content="Steem-Sport">

    <!-- Favicon-->
    {{--<link rel="icon" href="favicon.ico" type="image/x-icon">--}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

     <div class="container col-md-4">
         <div class="card border-primary mb-4" style="margin-top:10%;">
             <div class="card-header bg-transparent border-primary"><strong>LOGIN</strong></div>
             <div class="card-body text-primary">
                 <form action="" class="form">
                     <div class="container">
                         <div class="row col-md-12">
                             <div class="form-group col-md-12">
                                 <label for="" class="label-info">Email/Username:</label>
                                 <input type="text" placeholder="Enter Username or Email" class="form-control">
                             </div>
                         </div>

                         <div class="row col-md-12">
                             <div class="form-group col-md-12">
                                 <label for="" class="label-info">Pin</label>
                                 <input type="text" placeholder="Enter Pin or Key" class="form-control">
                             </div>
                         </div>

                         <div class="row col-md-12">
                             <div class="form-group col-md-12">
                                 <button name="submit" class="btn btn-primary btn-sm">Sign in</button>
                             </div>
                         </div>

                         <hr>


                         <h2>OR</h2>
                         <hr>

                         Sign in with Steem-Connect <br>

                         <button class="btn btn-primary btn-lg">Sign in With Steem-Connect</button>
                     </div>
                 </form>
             </div>
         </div>

     </div>
</body>

</html>
