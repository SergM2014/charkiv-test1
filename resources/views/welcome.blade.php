<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    </head>
    <body class="antialiased">

    <div class="container">
        <form id="searchForm" method="POST" action="/api/search" class="row g-3>
            @csrf
            <div class="col-12">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Name"  name="name">
                <div  class="form-text">Put a name</div>
            </div>

            <div class="col-6">
                <label for="minPrice" class="form-label">min Price</label>
                <input type="text" class="form-control" id="minPrice" name="minPrice">
                <div  class="form-text">Put min Price</div>
            </div>
            <div class="col-6">
                <label for="maxPrice" class="form-label">maxPrice</label>
                <input type="text" class="form-control" id="maxPrice" name="maxPrice">
                <div  class="form-text">Put max Price</div>
            </div>

            <div class="col-12">
                <label for="bedrooms" class="form-label">Bedrooms</label>
                <input type="text" class="form-control" id="bedrooms" name="bedrooms">
                <div  class="form-text">Put a number of bedrooms</div>
            </div>

            <div class="col-12">
                <label for="bathrooms" class="form-label">Bathrooms</label>
                <input type="text" class="form-control" id="bathrooms" name="bathrooms" >
                <div  class="form-text">Put a number of bathrooms</div>
            </div>

            <div class="col-12">
                <label for="storeys" class="form-label">Storeys</label>
                <input type="text" class="form-control" id="storeys" name="storeys" >
                <div  class="form-text">Put a number of Storeys</div>
            </div>

            <div class="col-12">
                <label for="garages" class="form-label">Garages</label>
                <input type="text" class="form-control" id="garages" name="garages" >
                <div  class="form-text">Put a number of Garages</div>
            </div>

            <button type="button" id="submitSearch" class="btn btn-primary">Submit</button>
        </form>

        <div id="results">
            
            <div id="resultsMessage" class="alert d-none" role="alert">
              
            </div>
            
                <table id="resultsTable" class="table table-striped d-none">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Bedrooms</th>
                      <th scope="col">Bathrooms</th>
                      <th scope="col">Storeys</th>
                      <th scope="col">Garages</th>
                    </tr>
                  </thead>
                  <tbody id="resultsOutput"> 
                  </tbody>
                </table>
     
        </div>

    </body>

    <script src="/main.js"></script>
    
</html>
