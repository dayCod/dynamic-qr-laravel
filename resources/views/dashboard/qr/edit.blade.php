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
                    <form action="{{ route('dashboard.qr.update', $qr->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <select name="employee_id" id="" class="form-control" required>
                                <option value="" selected hidden>Choose Employee Below</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" @selected(old('employee_id', $qr->employee_id) == $employee->id)>
                                        {{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1" value="linkedin" {{ ($qr->socmed->type !== 'linkedin') ? : 'checked'   }}>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Linkedin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" value="whatsapp"  {{ ($qr->socmed->type !== 'whatsapp') ? : 'checked'   }}>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Whatsapp
                                </label>
                            </div>
                        </div>

                        <div class="mb-3 {{ ($qr->socmed->type == 'linkedin') ? : 'd-none'   }}" id="linkedin">
                            <label for="">Linkedin URL</label>
                            <input type="text" class="form-control" name="linkedin" value="{{ ($qr->socmed->type !== 'linkedin') ? :$qr->socmed->string  }}">
                        </div>

                        <div class="mb-3 {{ ($qr->socmed->type == 'whatsapp') ? : 'd-none'   }}" id="whatsapp">
                            <label for="">Whatsapp Number</label>
                            <input type="number" class="form-control" name="whatsapp" value="{{ ($qr->socmed->type !== 'whatsapp') ? :$qr->socmed->string  }}">
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
                if ($(this).val() == "linkedin") {
                    showLinkedin()
                } else {
                    showWhatsapp()
                }
            })

            function showLinkedin() {
                $('#linkedin').removeClass('d-none')
                $('input[name="linkedin"]').val("")
                $('input[name="linkedin"]').attr('placeholder', 'Linkedin URL')
                $('#linkedin').attr('required', 'required')
                $('#whatsapp').addClass('d-none')
            }

            function showWhatsapp() {
                $('#whatsapp').removeClass('d-none')
                $('input[name="whatsapp"]').val("")
                $('input[name="whatsapp"]').attr('placeholder', 'Whatsapp Number')
                $('#whatsapp').attr('required', 'required')
                $('#linkedin').addClass('d-none')
            }
        })
    </script>
@endpush
