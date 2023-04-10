@if (Session::has('success'))
    <script>
        $(() => {
            iziToast.success({
                title: 'Success',
                message: "{{ Session::get('success') }}",
                position: 'topRight'
            });
        })
    </script>
@elseif(Session::has('fail'))
    <script>
        $(() => {
            iziToast.error({
                title: 'Error',
                message: "{{ Session::get('fail') }}",
                position: 'topRight'
            });
        })
    </script>
@elseif(Session::has('errors'))
    @foreach ($errors->all() as $error)
        <script>
            $(() => {
                iziToast.error({
                    title: 'Error',
                    message: "{{ $error }}",
                    position: 'topRight'
                });
            })
        </script>
    @endforeach
@endif
<script>
    $(document).ready(function() {
        $('.btn-delete').click(function(e) {
            e.preventDefault()
            let href = $(this).attr('href')
            swal({
                title: "Warning",
                text: "This Data Will be Deleted",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    $(this).parent('div').parent('div').parent('td').parent('tr').remove()
                    $.ajax({
                        url: href,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(res) {
                            swal({
                                title: 'Success',
                                text: 'Data Successfully Deleted',
                                icon: "success",
                                button: "Close"
                            }).then(() => {
                                location.reload()
                            })
                        },
                        error: function(res) {
                            swal({
                                title: "Oops..!",
                                text: "Something went Wrong",
                                icon: "error",
                                button: "Close",
                            }).then(() => {
                                location.reload();
                            });
                        }
                    })
                }
            })
        })
    })
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: ["Chrome", "Firefox", "IE"],
                datasets: [{
                    data: [4306, 3801, 1689],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger
                    ],
                    borderWidth: 5
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                cutoutPercentage: 75
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
        var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: "<span title=\"Previous month\">&laquo;</span>",
            nextArrow: "<span title=\"Next month\">&raquo;</span>",
            defaultDate: defaultDate
        });
    });
</script>
