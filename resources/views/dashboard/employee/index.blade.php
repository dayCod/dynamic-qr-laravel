@extends('dashboard.layout.master')

@section('content')
    <h1 class="h3 mb-3">{{ $title }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard.employee.create') }}" class="btn btn-secondary">
                        <i data-feather="plus"></i>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">#</th>
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">Email</th>
                                <th class="text-center" scope="col">Unit</th>
                                <th class="text-center" scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td class="text-center">#</td>
                            <td class="text-center">#</td>
                            <td class="text-center">#</td>
                            <td class="text-center">#</td>
                            <td class="text-center">
                                <a href="" class="btn btn-warning btn-sm rounded">
                                    <i data-feather="edit"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm btn-delete rounded">
                                    <i data-feather="trash"></i>
                                </a>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
