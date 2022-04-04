<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header">
                <form action="{{ route('searchAll') }}" method="GET">
                    <div class="row mb-2">
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="Search..." name="searchData"
                            value="{{ $sessionData }}">
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('customSearch') }}" method="GET">
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="">Name</label>
                            <input type="text" class="form-control" placeholder="Search Name.."
                            name="name">
                        </div>
                        <div class="col-4">
                            <label for="">Email</label>
                            <input type="email" class="form-control" placeholder="Search Email.."
                            name="email">
                        </div>
                        <div class="col-4">
                            <label for="">Address</label>
                            <input type="text" class="form-control" placeholder="Search Address.."
                            name="address">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="">Phone</label>
                            <input type="number" class="form-control" placeholder="Search Phone.."
                            name="phone">
                        </div>
                        <div class="col-4">
                            <label for="">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">-- Select gender --</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Age</label>
                            <input type="number" class="form-control" placeholder="Search Age.."
                            name="age">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="">Register (Start Date)</label>
                            <input type="date" class="form-control" placeholder="Search Start Date.." name="startDate">
                        </div>
                        <div class="col-6">
                            <label for="">(End Date)</label>
                            <input type="date" class="form-control" placeholder="Search End Date.."
                            name="endDate">
                        </div>
                    </div>
                    @if ($errors->has('endDate'))
                        <p style="color:red">{{ $errors->first('endDate') }}</p>
                    @endif
                    <input type="submit" value="Search" class="btn btn-secondary">
                </form>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Register-Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->age }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
