<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Water Calculation System</title>

    {{-- bootstrap links --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <style>

    </style>

</head>
<body>
    <h1 class="text-center">Water Calculation System</h1>

    <div class="cap mx-3 mb-5">
        <h3>Available Liters : <span style="color: blue">{{ $allRecords->last()->total_liters }}<span class="fs-6"> cm3</span></span></h3>
        <h2></h2>
    </div>

    <div class="mx-5">
        <form action="{{ route("store") }}" method="POST">
            @csrf
            <div class="">
                <div class="form-check form-check-inline">
                    Value Type :
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inputType" id="inlineRadio1" value="input" required>
                    <label class="form-check-label" for="inlineRadio1">Input Value</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inputType" id="inlineRadio2" value="output" required>
                    <label class="form-check-label" for="inlineRadio2">Output Value</label>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="Water Flow Time" name="time" required>
                <label for="floatingInput">Water Flow Time (seconds)</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="Flowing Speed" name="speed" required>
                <label for="floatingInput">Flowing Speed (cms)</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="Radius" name="radius" required>
                <label for="floatingInput">Radius (cm)</label>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

          <div class="error mb-5">
            @isset($error)
                <div id="emailHelp" class="form-text" style="color:red;">{{ $error.$allRecords->last()->total_liters }}</div>
            @endisset
          </div>

          <div class="store_table">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Record No.</th>
                    <th scope="col">Input Time</th>
                    <th scope="col">Output Time</th>
                    <th scope="col">Input Count</th>
                    <th scope="col">Output Count</th>
                    <th scope="col">Total Count</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($allRecords as $records)
                        <tr>
                            <th scope="row">{{ $records['id'] }}</th>
                            <td>{{ $records['input_time'] }}</td>
                            <td>{{ $records['output_time'] }}</td>
                            <td>{{ $records['input_liters'] }}</td>
                            <td>{{ $records['output_liters'] }}</td>
                            <td>{{ $records['total_liters'] }}</td>

                        </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
    </div>
</body>
</html>
