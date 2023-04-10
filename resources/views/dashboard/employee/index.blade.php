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
                                <th class="text-center" scope="col">Department</th>
                                <th class="text-center" scope="col">Created at</th>
                                <th class="text-center" scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $employee)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $employee->name }}</td>
                                <td class="text-center">{{ $employee->email }}</td>
                                <td class="text-center">{{ $employee->department->name }}</td>
                                <td class="unix-date text-center"></td>
                                <td class="text-center">
                                    <a href="{{ route('dashboard.employee.edit', $employee->id) }}" class="btn btn-warning btn-sm rounded">
                                        <i data-feather="edit"></i>
                                    </a>
                                    <a href="{{ route('dashboard.employee.destroy', $employee->id) }}" class="btn btn-danger btn-sm btn-delete rounded">
                                        <i data-feather="trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="6">{{ __('Data Kosong') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() { unixTimezone('{!! json_encode($employees) !!}') })
</script>
@endpush
