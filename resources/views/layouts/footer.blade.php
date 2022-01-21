</div>
</main>
<!--   Core JS Files   -->
<script src="{{ asset('softui') }}/assets/js/core/popper.min.js"></script>
<script src="{{ asset('softui') }}/assets/js/soft-ui-dashboard.min.js?v=1.0.3:1"></script>
<script src="{{ asset('softui') }}/assets/js/core/bootstrap.min.js"></script>
<script src="{{ asset('softui') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="{{ asset('softui') }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="{{ asset('softui') }}/assets/js/plugins/chartjs.min.js"></script>
<script type="text/javascript" src="{{ asset('DataTables') }}/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('.change-date').change(function() {
        $(this).closest("form").submit();
    });
</script>

<script>
    $(document).ready(function() {
        $('#rumah').DataTable();
        $('.select2').select2();

        $('#tanggal').change(function() {
            var tanggal = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('jimpitan.tgljimpitan') }}",
                method: "POST",
                data: {
                    tanggal: tanggal
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var html = '';
                    var i;
                    html = '<option value="" disabled selected hidden>Pilih </option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].nama +
                            '</option>';
                    }
                    $('#warga').html(html);
                }
            });
            return false;
        });

        $(document).on('click', '.editrumah', function() {
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('rumah.edit') }}",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {

                    $('[name="idedit"]').val(data.id);
                    $('[name="nama"]').val(data.nama);
                }
            });
        });

        $(document).on('click', '.editwarga', function() {
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('warga.edit') }}",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {

                    $('[name="idedit"]').val(data.id);
                    $('[name="nama"]').val(data.nama);
                    $('[name="block"]').val(data.block);
                    $('[name="norumah"]').val(data.norumah);
                }
            });
        });

        $(document).on('click', '.editprofile', function() {
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('profile.edit') }}",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    $('.wargaa').hide();
                    $('.role').hide();
                    $('[name="idedit"]').val(data.id);
                    $('[name="email"]').val(data.email);
                }
            });
        });

        $(document).on('click', '.editjimpitan', function() {
            var id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('jimpitan.edit') }}",
                method: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    var konten = $('.postnominal');
                    konten.empty();
                    $('[name="idedit"]').val(data.id);
                    $('[name="warga"]').val(data.warga);
                    $('[name="tanggal"]').val(data.tanggal);
                    konten.append('<div class="form-group">' +
                        '<label for="" >Nominal</label>' +
                        '<input type="text" name="nominal" class="form-control" id="nominal" value="' +
                        data.nominal +
                        '" placeholder="Nominal" >' +
                        '</div>');
                }
            });
        });

    });
</script>
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('jimpitan.chart') }}",
            method: "POST",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var tanggal = [];
                var nominal = [];
                for (var i in data) {
                    tanggal.push(data[i].tanggal);
                    nominal.push(data[i].sumnom);
                }

                var ctx = document.getElementById("chart-bars").getContext("2d");
                new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: tanggal,
                        datasets: [{
                            label: "Rp ",
                            tension: 0.4,
                            borderWidth: 0,
                            borderRadius: 4,
                            borderSkipped: false,
                            backgroundColor: "#fff",
                            data: nominal,
                            maxBarThickness: 10
                        }, ],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                        scales: {
                            y: {
                                grid: {
                                    drawBorder: false,
                                    display: true,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                },
                                ticks: {
                                    suggestedMin: 0,
                                    suggestedMax: 500,
                                    beginAtZero: true,
                                    padding: 15,
                                    font: {
                                        size: 14,
                                        family: "Open Sans",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                    color: "#fff"
                                },
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false
                                },
                                ticks: {
                                    display: true,
                                    color: "#fff"
                                },
                            },
                        },
                    },
                });
            }
        });

        $.ajax({
            url: "{{ route('jimpitan.chartbulan') }}",
            method: "POST",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var bulan = [];
                var nominal = [];
                for (var i in data) {
                    bulan.push(data[i].bulan);
                    nominal.push(data[i].sumnom);
                }
                var ctx2 = document.getElementById("chart-line").getContext("2d");

                var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

                gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
                gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

                var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

                gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
                gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

                new Chart(ctx2, {
                    type: "line",
                    data: {
                        labels: bulan,
                        datasets: [{
                                label: "Mobile apps",
                                tension: 0.4,
                                borderWidth: 0,
                                pointRadius: 0,
                                borderColor: "#cb0c9f",
                                borderWidth: 3,
                                backgroundColor: gradientStroke1,
                                fill: true,
                                data: nominal,
                                maxBarThickness: 6

                            },
                            // {
                            //     label: "Websites",
                            //     tension: 0.4,
                            //     borderWidth: 0,
                            //     pointRadius: 0,
                            //     borderColor: "#3A416F",
                            //     borderWidth: 3,
                            //     backgroundColor: gradientStroke2,
                            //     fill: true,
                            //     data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                            //     maxBarThickness: 6
                            // },
                        ],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                        scales: {
                            y: {
                                grid: {
                                    drawBorder: false,
                                    display: true,
                                    drawOnChartArea: true,
                                    drawTicks: false,
                                    borderDash: [5, 5]
                                },
                                ticks: {
                                    display: true,
                                    padding: 10,
                                    color: '#b2b9bf',
                                    font: {
                                        size: 11,
                                        family: "Open Sans",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                }
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                    borderDash: [5, 5]
                                },
                                ticks: {
                                    display: true,
                                    color: '#b2b9bf',
                                    padding: 20,
                                    font: {
                                        size: 11,
                                        family: "Open Sans",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                }
                            },
                        },
                    },
                });
            }
        });
    });
</script>

<script>
    function showNotif(text) {

        $('#text-notif').html(text);
        $('#topbar-notification').fadeIn();

        setTimeout(function() {
            $('#topbar-notification').fadeOut();
        }, 2000)
    }

    function showAlert(text) {

        $('#alert-notif').html(text);
        $('#alert-notification').fadeIn();

        setTimeout(function() {
            $('#alert-notification').fadeOut();
        }, 2000)
    }
</script>
@if (!empty(Session::get('status')) && Session::get('status') == '1')
    <script>
        showNotif("{{ Session::get('message') }}");
    </script>
@endif

@if (!empty(Session::get('status')) && Session::get('status') == '2')
    <script>
        showAlert("{{ Session::get('message') }}");
    </script>
@endif
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>


<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('softui') }}/assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
