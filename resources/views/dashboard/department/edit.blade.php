@extends('dashboard.layout.master')

@section('content')
    <h1 class="h3 mb-3">{{ $title }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard.employee.index') }}" class="btn btn-secondary">
                        <i data-feather="arrow-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.department.update', $department->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Name" name="name" value="{{ old('name', $department->name) }}">
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
