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
                    <form action="{{ route('dashboard.qr.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <select name="employee_id" id="" class="form-control" required>
                                <option value="" selected hidden>Choose Employee Below</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" @selected(old('employee_id') == $employee->id)>
                                        {{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1" value="linkedin" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Linkedin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" value="whatsapp">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Whatsapp
                                </label>
                            </div>
                        </div>

                        <div class="mb-3" id="linkedin">
                            <input type="text" class="form-control" name="linkedin" placeholder="Linkedin URL">
                        </div>

                        <div class="mb-3 d-none" id="whatsapp">
                            <input type="number" class="form-control" name="whatsapp" placeholder="Whatsapp Number">
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.form-check-input').change(function() {
                ($(this).val() == "linkedin") ? showLinkedin() : showWhatsapp()
            })

            function showLinkedin() {
                $('#linkedin').removeClass('d-none')
                $('input[name="linkedin"]').attr('required', 'required')
                $('#whatsapp').addClass('d-none')
            }

            function showWhatsapp() {
                $('#whatsapp').removeClass('d-none')
                $('input[name="whatsapp"]').attr('required', 'required')
                $('#linkedin').addClass('d-none')
            }
        })
    </script>
@endpush
