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
                                            <th>NIM</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>No. Hp</th>
                                            <th>Fakultas/Jurusan/Prodi</th>
                                            <th>Foto</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
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
        $("#table").DataTable({
            ajax: api + `service/cluster/get`,
            columns: [{
                    "render": function(data, type, row, meta) {

                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    className: "text-center"
                },
                {
                    data: 'cluster'
                },
                {
                    data: 'cluster'
                },
                {
                    data: 'cluster'
                },
                {
                    data: 'cluster'
                },
                {
                    data: 'cluster'
                },
                {
                    data: 'cluster'
                },
                {
                    "render": function(data, type, row, meta) {
                        return `
						<button class="btn btn-default btn-delete"><i class="fas fa-trash"></i></button>
						<button class="btn btn-primary btn-view"><i class="fa fa-eye"></i> Detail </button>`;
                    }
                }
            ]
        })
        var table = $('#table').DataTable()
        $('#table tbody').on('click', 'button.btn-view', function() {
            let data = table.row($(this).parents('tr')).data()
            $('#view-id').val(data.id)
            $('#view-cluster').val(data.cluster)
            $('#view').modal('show')
        })

        $('#table tbody').on('click', 'button.btn-delete', function() {
            let data = table.row($(this).parents('tr')).data()
            swal({
                    title: "Apakah Kamu yakin?",
                    text: `menghapus ${data.cluster} dari Brain Apps.`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: api + 'service/cluster/delete',
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