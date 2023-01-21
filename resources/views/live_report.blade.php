<!DOCTYPE html>
<html>
    <head>
        <title>Dilaundry - Live Report</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $laundries->name}}</h1>
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


{{-- @foreach($laundries as $laundry) --}}
    <div class="card shadow">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="mb-0">{{ $laundries->laundry_id}}</h2>
                </div>
            </div>
        </div>
        <div class="card-body border-0">
            <div class="row">
                <div class="col-4">
                    @foreach ($laundries->cloths as $cloth )

                    @endforeach
                    <img src="/storage/product/{{ $cloth -> detail }}" width= "300px" >
                </div>
            </div>
        </div>
    </div>
    <br>
{{-- @endforeach --}}
