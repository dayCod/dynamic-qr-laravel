@extends('dashboard.layout.master')

@section('content')
    <h1 class="h3 mb-3">{{ $title }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('dashboard.department.create') }}" class="btn btn-secondary">
                            <i data-feather="plus"></i>
                        </a>
                        <a href="{{ route('dashboard.department.trash') }}" class="btn btn-secondary">
                            <i data-feather="trash"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">#</th>
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">Created at</th>
                                <th class="text-center" scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($departments as $department)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $department->name }}</td>
                                    <td class="unix-date text-center"></td>
                                    <td class="text-center">
                                        <a href="{{ route('dashboard.department.edit', $department->id) }}"
                                            class="btn btn-warning btn-sm rounded">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="{{ route('dashboard.department.destroy', $department->id) }}" class="btn btn-danger btn-sm btn-delete rounded">
                                            <i data-feather="trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">{{ __('Data Kosong') }}</td>
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
    $(document).ready(function() { unixTimezone('{!! json_encode($departments) !!}') })
</script>
@endpush
