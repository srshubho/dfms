<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dairy Farm Management System</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inconsolata&family=Oswald:wght@200;300&family=Raleway:wght@100;400&display=swap');
    </style>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="Font">
    <div class="d-flex justify-content-center start">
        <h1>COW SHED</h1>
    </div>
    @if ($message)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container d-flex justify-content-center start hello ">
        <form class="row g-3 " action="{{ route('shades.store') }}" method="POST">
            @csrf
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Shed No</label>
                <input type="text" class="form-control" id="validationDefault01" name="shade_no" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Shed Area</label>
                <input type="number" class="form-control" id="validationDefault02" name="area" required>
            </div>
            <div class="col-md-3">
                <label for="validationDefault04" class="form-label">Cow Capacity</label>
                <input type="number" class="form-control" id="validationDefault02" name="capacity" required>

            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Create Shed</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
