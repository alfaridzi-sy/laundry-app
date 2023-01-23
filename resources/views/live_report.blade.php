<!DOCTYPE html>
<html>
    <head>
        <title>Dilaundry - Live</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto mt-5 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $laundries->name}}</h3>
                            <br>
                            <div class="form-group">
                                <form action="{{route('changeDate', $laundries->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group">
                                        <input type="date" id="finish_date" name="finish_date" class="form-control" value="{{ $laundries->finish_date }}" min="2022-01-01" max="2023-12-31" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-warning" type="submit">Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <p class="card-text">{{ $laundries->customer_name}}</p>
                            <p class="card-text">{{ $laundries->customer_phone_number}}</p>
                            <p class="card-text">{{ $laundries->price}} IDR</p>
                            <p class="card-text"><b>{{ $laundries->customer_address}}</b></p>


                            @foreach ($laundries->cloths as $cloth )
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <img src="https://laundry.umkmbedigital.com/public/storage/cloth/{{ $cloth-> image}}" class="img-fluid">
                                </div>
                                <div class="col-sm-6">
                                    <h5>{{ $cloth->category}}</h5>
                                    <?php
                                        if($laundries->status == "DONE"){
                                    ?>
                                        <button type="button" class="btn btn-sm btn-success" style="border-radius: 25px;" disabled>Sudah Diambil</button>
                                    <?php
                                        }else{
                                            if($cloth->status == "clean"){
                                    ?>
                                        <button type="button" class="btn btn-sm btn-success" style="border-radius: 25px;" disabled>Sudah Diambil</button>
                                    <?php
                                            }else{
                                    ?>
                                        <button type="button" class="btn btn-sm btn-secondary" style="border-radius: 25px;" disabled>Belum Diambil</button>
                                    <?php
                                            }
                                        }
                                    ?>
                                    <p class="card-text"><br> {{ $cloth->detail}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
