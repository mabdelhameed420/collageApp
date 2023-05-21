<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('assets/css/styleOffers.css') }}">
</head>

<body id="body">
    <center>

        @if (Session::has('success'))
            <div>
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="registration-form">
            <form method="POST" action="{{ route('offers.store') }}" id="form">

                @csrf

                <div class="form-group">
                    <input type="text" class="form-control item" id="name" placeholder="name" name="name">
                </div>

                @error('name')
                    <small class="red-falg">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <input type="text" class="form-control item" id="price" placeholder="price" name="price" maxlength="10">
                </div>

                @error('price')
                    <small class="red-falg">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <input type="text" class="form-control item" id="details" placeholder="details" name="details">
                </div>

                @error('details')
                    <small class="red-falg">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <button type="submit" class="registration-form" id="create_offer" placeholder="create_offer"
                        name="create_offer">Add Your Offer</button>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
        </script>
        <script src="assets/js/scriptOffers.js"></script>
    </center>
</body>

</html>
