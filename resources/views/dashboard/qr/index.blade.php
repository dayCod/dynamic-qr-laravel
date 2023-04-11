@extends('dashboard.layout.master')

@section('content')
    <h1 class="h3 mb-3">{{ $title }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dashboard.qr.create') }}" class="btn btn-secondary">
                        <i data-feather="plus"></i>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">#</th>
                                <th class="text-center" scope="col">Employee</th>
                                <th class="text-center" scope="col">QR</th>
                                <th class="text-center" scope="col">Limit</th>
                                <th class="text-center" scope="col">Status</th>
                                <th class="text-center" scope="col">Created at</th>
                                <th class="text-center" scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($qrs as $qr)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $qr->employee->name }}</td>
                                    <td class="text-center">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" id="modal">
                                            Show QR
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! QrCode::size(300)->generate(route('qr.process', [Str::slug($qr->employee->name), $qr->id])) !!}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $qr->limit }}</td>
                                    <td class="text-center">{{ $qr->status == 0 ? 'valid' : 'invalid' }}</td>
                                    <td class="unix-date text-center"></td>
                                    <td class="text-center">
                                        <a href="{{ route('dashboard.qr.edit', $qr->id) }}"
                                            class="btn btn-warning btn-sm rounded">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="{{ route('dashboard.qr.destroy', $qr->id) }}"
                                            class="btn btn-danger btn-sm btn-delete rounded">
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
    $(document).ready(function() { unixTimezone('{!! json_encode($qrs) !!}') })
</script>
@endpush
