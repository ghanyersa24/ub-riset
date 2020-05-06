<div class="main-content">
    <section class="section">
        <div class="section-header d-block justify-content-start align-items-center">
            <h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
        </div>

        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card ">

                        <div class="card-body">
                            <h4>Daftar pengajuan verifikasi</h4>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No.
                                            </th>
                                            <th>Nama Produk</th>
                                            <th>Inventor</th>
                                            <th>Waktu pengajuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">

                                            </th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    const listPengajuan = [{

        slug: '003-brain-apps',
        name: 'Brain Apps',
        inventor: 'Ghany Abdillah Ersa',
        time: '06, Mei 2020'

    }]
    $(document).ready(function() {
        $("#table").DataTable({
            data: listPengajuan,
            columns: [{
                    "render": function(data, type, row, meta) {

                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    className: "text-center"
                },
                {
                    data: 'name'
                },
                {
                    data: 'inventor'
                },
                {
                    data: 'time'
                },
                {
                    "render": function(data, type, JsonResultRow, meta) {
                        return '<button class="btn btn-primary"><i class="fa fa-eye"></i> Detail </button>';
                    }
                }
            ]
        })
        var table = $('#table').DataTable()
        $('#table tbody').on('click', 'button', function() {
            var data = table.row($(this).parents('tr')).data();
            let baseUrl = "<?= base_url() . 'admin/verifikasi/' ?>"
            window.location.replace(baseUrl + data.slug);
        })
    })
</script>