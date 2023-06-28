@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  
                    <!DOCTYPE html>
                        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
                        <head>
                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                           
                            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
                        </head>
                        <body>
                            <div class="container mt-5 text-center">
                                <h2 class="mb-4">
                                    Grades Summazer
                                </h2>
                                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                        <div class="custom-file text-left">
                                            <input type="file" name="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">Import data</button>
                                    <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>
                                </form>
                            </div>
                        </body>
                        </html>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
