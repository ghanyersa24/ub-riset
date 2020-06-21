<div class="main-content">
    <section class="section">
        <div class="section-header d-block justify-content-start align-items-center">
            <h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
        </div>
        <button class="btn btn-info " data-toggle="modal" data-target="#add" style="position: fixed; bottom: 36px;   right: 20px; padding: 18.5px;z-index: 10;">
            <i class="fa fa-plus"></i>
        </button>

        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th width="10%" class="text-center">
                                                No.
                                            </th>
                                            <th>NIM/NIP</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>No. Hp</th>
                                            <th>Fakultas/Jurusan/Prodi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="10%" class="text-center"></th>
                                            <th>NIM/NIP</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>No. Hp</th>
                                            <th>Fakultas/Jurusan/Prodi</th>
                                            <th>Status</th>
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
<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Cluster</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <form id="form-add" class="form-add">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="add-cluster">Nama Cluster</label>
                        <input id="add-cluster" class="form-control" type="text" name="cluster" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btn-save" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="view" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Cluster</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <form id="form-view" class="form-view">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="view-cluster">Nama Cluster</label>
                        <input id="view-id" class="form-control" type="text" name="id" required hidden readonly>
                        <input id="view-cluster" class="form-control" type="text" name="cluster" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btn-save" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table tfoot th').each(function() {
            var title = $(this).text();
            if ($(this).text() !== '') {
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            }
        });
        $("#table").DataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.footer()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            },
            ajax: api + `account/users/get_all`,
            columns: [{
                    "render": function(data, type, row, meta) {

                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    className: "text-center"
                },
                {
                    data: 'identifier'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'email'
                },
                {
                    data: 'kontak'
                },
                {
                    render: (data, type, row, meta) => {
                        return `${row.fakultas}/${row.jurusan}/${row.prodi}`
                    }
                },
                {
                    data: 'status'
                }
            ]
        })
        var table = $('#table').DataTable()
        $('#table tbody').on('click', 'button.btn-view', function() {
            let data = table.row($(this).parents('tr')).data()
            swal({
                    title: "Apakah Kamu yakin?",
                    text: `untuk menyetejui ${data.nama_lengkap} sebagai alumni.`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willApprove) => {
                    if (willApprove) {
                        $.ajax({
                            type: "POST",
                            url: api + 'account/users/alumni/update',
                            data: {
                                id: data.id,
                            },
                            success: function(response) {
                                response_alert(response)
                                if (!response.error)
                                    $('#table').dataTable().api().ajax.reload()
                            }
                        })
                    }
                });
        })

        $('#table tbody').on('click', 'button.btn-delete', function() {
            let data = table.row($(this).parents('tr')).data()
            swal({
                    title: "Apakah Kamu yakin?",
                    text: `menghapus ${data.nama_lengkap} dari verifikasi alumni.`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: api + 'account/users/alumni/delete',
                            data: {
                                id: data.id,
                            },
                            success: function(response) {
                                response_alert(response)
                                if (!response.error)
                                    $('#table').dataTable().api().ajax.reload()
                            }
                        })
                    }
                });
        })

        $('#form-view').validate({
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: api + "service/cluster/update",
                    data: $('#form-view').serialize(),
                    success: function(response) {
                        response_alert(response)
                        if (!response.error) {
                            $('#view').modal('hide')
                            $('#table').dataTable().api().ajax.reload()
                        }
                    }
                })
            }
        })
        $('#form-add').validate({
            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: api + "service/cluster/create",
                    data: $('#form-add').serialize(),
                    success: function(response) {
                        response_alert(response)
                        if (!response.error) {
                            $('#add').modal('hide')
                            $('#table').dataTable().api().ajax.reload()
                        }
                    }
                })
            }
        })
    })
</script>