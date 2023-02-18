<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <div class="mx-auto border" style="max-width: 400px; height: 100vh">
        <div class="container-fluid p-0">
            <div class="bg-primary bg-gradient w-100 position-relative" style="height: 200px">
                <div class="d-flex align-items-center text-white pt-5 ps-3">
                    <h1 class="m-0 me-2" style="font-size: 3rem">04</h1>
                    <div>
                        <h3 class="m-0">January</h3>
                        <p class="m-0">2023</p>
                    </div>
                    <h5 class="m-0 ms-auto me-4">My Todo</h5>
                </div>
                <form action="/" method="post">
                    @csrf
                    <div class="d-flex p-3 position-absolute bottom-0 w-100">
                        <div class="w-100">
                            <input type="text" name="list" id="list"
                                class="form-control @error('list') is-invalid @enderror">
                            @error('list')
                                <p class="invalid-feedback m-0">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark ms-1">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="p-3">
                <ul class="list-unstyled">
                    @forelse ($todos as $todo)
                        <li class="border-start border-primary border-3 p-2 mb-3 d-flex shadow-sm">
                            <h5>{{ $todo->list }}</h5>
                            <div class="d-flex ms-auto">
                                <form action="/{{ $todo->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="ri-close-circle-line text-danger fs-4" style="cursor: pointer"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <p>tidak ada list hari ini</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
