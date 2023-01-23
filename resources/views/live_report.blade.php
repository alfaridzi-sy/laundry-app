<!DOCTYPE html>
<html>
    <head>
        <title>Dilaundry - Live</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $laundries->name}}</h1>
                </div>
                <div class="col-md-12">
                    <form action="{{route('changeDate', $laundries->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="date" id="finish_date" name="finish_date" class="form-control col-6" value="{{ $laundries->finish_date }}" min="2022-01-01" max="2023-12-31" required>
                        <button type="submit" class="btn btn-warning col-6">
                            {{ __('Update') }}
                        </button>
                    </form>
                    {{-- <p>{{ $laundries->finish_date }}</p> --}}
                </div>
                <div class="col-md-12">
                    <p>{{ $laundries->customer_name}}</p>
                    <p>{{ $laundries->customer_phone_number}}</p>
                    <p>{{ $laundries->price}} IDR</p>
                    <p><b>{{ $laundries->customer_address}}</b></p>
                </div>
                @foreach ($laundries->cloths as $cloth )
                <div class="col-md-12">
                    <div class="col-md-6">
                        <img class="img-responsive" src="https://laundry.umkmbedigital.com/public/storage/cloth/{{ $cloth-> image}}" alt="Product Image">
                    </div>
                    <div class="col-md-6">
                        <h3>{{ $cloth->category}}</h3>
                        <p>{{ $cloth->status}}</p>
                        <p>{{ $cloth->detail}}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </body>
</html>
