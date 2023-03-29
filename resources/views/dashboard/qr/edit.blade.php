@extends('dashboard.layout.master')

@section('content')
<h1 class="h3 mb-3">{{ $title }}</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('dashboard.qr.index') }}" class="btn btn-secondary">
                    <i data-feather="arrow-left"></i>
                </a>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Unit">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
