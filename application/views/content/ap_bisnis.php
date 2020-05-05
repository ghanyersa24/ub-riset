<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header d-block justify-content-start align-items-center">
            <a href="<?= base_url('admin/detail/' . $slug) ?>"><i class="fa fa-chevron-left h5"></i>
            </a>
            <h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
        </div>


        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card ">
                        
                            <div class="card-body">
                                <div class="tabs">
                                    <input type="radio" id="tab1" name="tab-control" checked>
                                    <input type="radio" id="tab2" name="tab-control">
                                    <input type="radio" id="tab3" name="tab-control">
                                    <input type="radio" id="tab4" name="tab-control">
                                    
                                    <ul>
                                        <li title="data dasar">
                                            <label for="tab1" role="button" id="tabs-profil">
                                                <i class="fas fa-stream"></i>
                                                <br><span>Data Dasar</span>
                                            </label>
                                        </li>
                                        <li title="pemasaran">
                                            <label for="tab2" role="button" id="tabs-pengurus">
                                                <i class="fa fa-bullhorn"></i>
                                                <br><span>Pemasaran</span>
                                            </label>
                                        </li>
                                        <li title="produksi">
                                            <label for="tab3" role="button" id="tabs-kepemilikan">
                                                <i class="fas fa-dice-d6"></i>
                                                <br><span>Produksi</span>
                                            </label>
                                        </li>
                                        <li title="penjualan & omset">
                                            <label for="tab4" role="button" id="tabs-aset">
                                                <i class="fas fa-poll"></i>
                                                <br><span>Penjualan & Omset</span>
                                            </label>
                                        </li>
                                        
                                    </ul>
                                    <div class="slider">
                                        <div class="indicator"></div>
                                    </div>
                                    <div class="content">
                                        <section id="tab-profil">
                                            <form id="form-view-data">
                                                <button class="btn btn-primary d-block mr-0 mb-4" type="submit">Simpan Data Dasar</button>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <input id="view-id" class="form-control" type="text" name="id" hidden readonly>
                                                        <label for="view-status_usaha" class="">Status Usaha </label>
                                                        <select id="view-status_usaha" class="form-control" name="status_usaha">
                                                            <option value="Masih Berjalan">Masih Berjalan</option>
                                                            <option value="Sudah Berhenti">Sudah Berhenti</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="view-target_pasar">Target Pasar <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Penjelasan mengenai target pasar yang akan dituju">!</span></label>
                                                        <textarea  class="form-control" id="view-target_pasar" name="target_pasar"></textarea>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="view-kompetitor">Kompetitor <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Identifikasi kompetitor serta perbandingan antara produk anda dengan kompetitor">!</span></label>
                                                        <textarea  class="form-control" id="view-kompetitor" name="kompetitor"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="view-jangkauan_pemasaran">Jangkauan Pemasaran<span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Penjelasan jangkauan pemasaran">!</span></label>
                                                        <textarea  class="form-control" id="view-jangkauan_pemasaran" name="jangkauan_pemasaran"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="view-kanal_pemasaran">Kanal Pemasaran <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Misal (public relation, social media, digital advertising, offline promo, dsb)">!</span></label>
                                                        <textarea type="number" class="form-control" id="view-kanal_pemasaran" name="kanal_pemasaran" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="view-dampak_sosial">Dampak Sosial <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Dampak sosial yang dihasilkan oleh produk">!</span></label>
                                                        <textarea type="number" class="form-control" id="view-dampak_sosial" name="dampak_sosial"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="view-skema_harga">Skema Harga <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Skema harga yang digunakan">!</span></label>
                                                        <textarea type="number" class="form-control" id="view-skema_harga" name="skema_harga"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="view-harga_pokok">Harga Pokok Produksi <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Penjelasan HPP">!</span></label>
                                                        <input type="number" class="form-control" id="view-harga_pokok" name="harga_pokok">
                                                    </div>
                                                </div>

                                            </div>
                                            </form>
                                        </section>

                                        <section id="tab-pemasaran">
                                            <div id="pemasaran-wrap">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table-kepemilikian">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                                No.
                                                            </th>
                                                            <th>Jenis jangkauan pemasaran</th>
                                                            <th>Volume pemasaran</th>
                                                            <th>Nilai pemasaran</th>
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
                                            <form id="form-add-pemasaran">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="add-jangkauan_pemasaran">Jenis Jangkauan Pemasaran</label>
                                                <select name="jangkauan_pemasaran" id="add-jangkauan_pemasaran" class="form-control">
                                                    <option value="Regional">Regional</option>
                                                    <option value="Nasional">Nasional</option>
                                                    <option value="Ekspor">Ekspor</option>
                                                </select>
                                                
                                            </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="add-volume_pemasaran">Volume Pemasaran <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jumlah volume produk yang dipasarkan hingga saat ini">!</span></label>
                                                <input type="text" class="form-control" id="view-volume_pemasaran" name="volume_pemasaran">
                                            </div>

                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="add-nilai_pemasaran">Nilai Pemasaran <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Nilai penjualan produk yang dipasarkan hingga saat ini">!</span></label>
                                                <input type="text" class="form-control" id="add-nilai_pemasaran" name="nilai_pemasaran">
                                            </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="h-100 d-flex align-items-center">
                                                <button class="btn btn-primary" type="submit">Tambah Data Pemasaran</button>
                                                </div>
                                                </div>
                                            </div>   
                                            </form>                                      
                                        </section>
                                        <section id="tab-aset">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table-kepemilikian">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                                No.
                                                            </th>
                                                            <th>Jenis Periode</th>
                                                            <th>Tahun Produksi</th>
                                                            <th>Jumlah Produksi</th>
                                                            
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

                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <form id="form-add-produksi">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="add-jenis_periode_produksi">Jenis Periode</label>
                                                <select name="jenis_periode_produksi" id="add-jenis_periode_produksi" class="form-control">
                                                    <option value="Perolehan">Perolehan</option>
                                                    <option value="Proyeksi">Proyeksi</option>
                                                    
                                                </select>
                                                
                                            </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="add-tahun_produksi">Tahun Produksi</label>
                                                <input type="text" class="form-control" id="add-tahun_produksi" name="tahun_produksi">
                                            </div>

                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="add-jumlah_produksi">Jumlah Produksi</label>
                                                <input type="text" class="form-control" id="add-jumlah_produksi" name="jumlah_produksi">
                                            </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="h-100 d-flex align-items-center">
                                                <button class="btn btn-primary" type="submit">Tambah Data Produksi</button>
                                                </div>
                                                </div>
                                            </div>  
                                            </form>
                                        </section>
                                        <section id="tab-penjualan">
                                        <div id="penjualan-wrap">
                                        <h4>Data Penjualan</h4>
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table-kepemilikian">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                                No.
                                                            </th>
                                                            <th>Jenis Periode</th>
                                                            <th>Tahun Penjualan</th>
                                                            <th>Jumlah Penjualan</th>
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
                                            <form id="form-add-penjualan">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="add-jenis_periode_penjualan">Jenis Periode</label>
                                                <select name="jenis_periode_penjualan" id="add-jenis_periode_penjualan" class="form-control">
                                                    <option value="Perolehan">Perolehan</option>
                                                    <option value="Proyeksi">Proyeksi</option>
                                                    
                                                </select>
                                                
                                            </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="add-tahun_penjualan">Tahun Penjualan</label>
                                                <input type="number" class="form-control" id="add-tahun_penjualan" name="tahun_penjualan">
                                            </div>

                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="add-jumlah_penjualan">Jumlah Penjualan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jumlah unit produk yang terjual">!</span></label>
                                                <input type="text" class="form-control" id="add-jumlah_penjualan" name="jumlah_penjualan">
                                            </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="h-100 d-flex align-items-center">
                                                <button class="btn btn-primary" type="submit">Tambah Data Penjualan</button>
                                                </div>
                                                </div>
                                            </div>  
                                            </form>
                                            <div class="py-4"></div>
                                            <div id="omset-wrap">
                                                <h4>Data Omset/Profit</h4>
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table-kepemilikian">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                                No.
                                                            </th>
                                                            <th>Jenis Periode</th>
                                                            <th>Tipe</th>
                                                            <th>Jenis omset / profit</th>
                                                            <th>Tahun</th>
                                                            <th>Nilai</th>
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
                                                            <th></th>
                                                            
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            </div>
                                            <form action="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="add-jenis_periode_omset">Jenis Periode</label>
                                                <select name="jenis_periode_omset" id="add-jenis_periode_omset" class="form-control">
                                                    <option value="Perolehan">Perolehan</option>
                                                    <option value="Proyeksi">Proyeksi</option>
                                                    
                                                </select>
                                                
                                            </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="add-tipe_omset">Tipe Omset/Profit</label>
                                                <select name="tipe_omset" id="add-tipe_omset" class="form-control">
                                                    <option value="Omset">Omset</option>
                                                    <option value="Profit">Profit</option>
                                                    
                                                </select>
                                                
                                            </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="add-jenis_omset">Jenis Omset/Profit</label>
                                                <select name="jenis_omset" id="add-jenis_omset" class="form-control">
                                                    <option value="Perusahaan">Perusahaan</option>
                                                    <option value="Produk (yang diajukan)">Produk (yang diajukan)</option>
                                                    
                                                </select>
                                                
                                            </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="view-tahun_omset">Tahun Omset/Profit</label>
                                                <input type="number" class="form-control" id="view-tahun_omset" name="tahun_omset">
                                            </div>

                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="view-nilai_omset">Nilai Omset</label>
                                                <input type="number" class="form-control" id="view-nilai_omset" name="nilai_omset">
                                            </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="h-100 d-flex align-items-center">
                                                <button class="btn btn-primary" type="submit">Tambah Data Omset/Profit</button>
                                                </div>
                                                </div>
                                            </div>  
                                            </form>
                                        </section>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="progress-upload" class="position-fixed row bg-trans h-100" tabindex="-1" style="display:none; top:0; left:0; right:0;z-index:999999;background: rgba(137, 191, 202, 0.48)">
    <div class="d-flex justify-content-center vw-100">
        <div class="d-flex align-items-center" style="width: 15%;top:50vh">
            <img src="https://media3.giphy.com/media/1YePlEuqaWfba/source.gif" alt="" class="w-100">
        </div>
    </div>
</div>

<div id="logo" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label>Upload Logo Produk</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="view-logo" aria-describedby="btn-upload">
                            <label class="custom-file-label" for="view-logo">Cari file</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="btn-upload">Upload</button>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center w-100 ">
                    <img style="display:none" src="" alt="logo produk" id="prev-view-logo" class="w-75 text-center">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        triggerEditor('#form-view-data')
    $('#view-logo').change(function() {
        let filename = document.getElementById('view-logo').files[0].name
        $('label.custom-file-label').html(filename)
        $('#prev-view-logo').show()
    })

    $('#btn-upload').click(async function(e) {
        if (document.getElementById('view-logo').files[0] == undefined) {
            $('label.custom-file-label').html('<span class="text-danger">Pilih file terlebih dahulu</span>');
        } else {
            await $('#progress-upload').fadeIn().delay(500)
            $('body').addClass('overflow-hidden')
            let formData = new FormData();
            formData.append('logo_produk', document.getElementById('view-logo').files[0])
            formData.append('id', $('#view-id').val())
            await setTimeout(async function() {
                await $.ajax({
                    type: "POST",
                    url: api + 'service/produk/upload',
                    data: formData,
                    async: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        setTimeout(function() {
                            response_alert(response)
                            if (!response.error) {
                                $('#prev-view-logo_produk').attr('src', response.data.logo_produk)
                                $('label.custom-file-label').html('<span class="text-primary">File berhasil diupload</span>')
                                $('#logo').modal('hide')
                            }
                        }, 500)
                    }
                })
                await $('body').removeClass('overflow-hidden')
                await $('#progress-upload').fadeOut()
            }, 1500)
        }
    });

    function del(id, link) {
        swal({
                title: "Apakah Kamu yakin?",
                text: "untuk menghapus pengurus ini dari perusahaan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: api + 'service/foto_produk/delete',
                        data: {
                            id: id,
                            foto_old: link
                        },
                        dataType: "json",
                        success: function(response) {
                            response_alert(response)
                            if (!response.error)
                                get()
                        }
                    })
                }
            });
    }
    const pengurusList = [{
            id: 1,
            text: '175150400111035 - Fawwaz Daffa Muhammad'
        },
        {
            id: 2,
            text: '175150400111034 - Reyhan Ivandi'
        },
        {
            id: 3,
            text: '175150400111035 - Ghany Abdillah Ersa'
        }
    ]
    
        
        //table-kepemilikan
        $("#table-kepemilikan").DataTable({
            "ajax": api + 'service/kekayaan_intelektual/get/<?= $id ?>',
            "columns": [{
                "render": function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
                className: "text-center"
            }, {
                "data": "jenis"
            }, {
                "data": "tanggal_mulai"
            }, {
                "data": "tanggal_selesai"
            }, {
                "data": "status_perolehan"
            }, {
                "render": function(data, type, JsonResultRow, meta) {
                    return '<button class="btn btn-primary"><i class="fa fa-eye"></i> Detail </button>';
                }
            }]
        })
        //end of table-kepemilikan
        $("#view-pengurus").select2({
            data: pengurusList,
            tags: true
        })
        $.ajax({
            type: "GET",
            url: api + 'service/produk/get/<?= $id ?>',
            success: function(response) {
                let data = response.data
                for (key in data) {
                    $(`#view-${key}`).val(data[key])
                }
                $('#prev-view-logo_produk').attr('src', response.data.logo_produk)

                let kategori = JSON.parse(data.kategori)
                $(`#view-kategori`).val(kategori)
                $("#view-kategori").select2({
                    tags: true,
                    tokenSeparators: kategori
                })
            }
        })

        $('#form-view').validate({
            rules: {
                id: {
                    required: true,
                },
                nama_produk: {
                    required: true,
                },
                jenis: {
                    required: true
                },
                deskripsi_singkat: {
                    required: true
                },
                bidang: {
                    required: true,
                },
                kesiapan_teknologi: {
                    required: true
                },
                kepemilikan_teknologi: {
                    required: true
                },
                pemilik_teknologi: {
                    required: true
                }
            },
            submitHandler: function(form) {
                var data = $('#form-view').serialize()
                $.ajax({
                    type: "POST",
                    url: api + "service/produk/update",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $.ajax({
                            type: "POST",
                            url: api + "service/produk/update",
                            data: data,
                            dataType: "json",
                            success: function(response) {
                                response_alert(response)
                                setTimeout(function() {
                                    window.location.replace(`<?= base_url() ?>admin/detail/${pad(response.data.id)+'-'+response.data.nama_produk.replace(/ /gi,"-")}`)
                                }, 2000)
                            }
                        })
                    }
                })
            }
        })
    });

    $("#view-logo").change(function() {
        readURL(this)
    })

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader()
            reader.onload = function(e) {
                $('#prev-view-logo').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0])
        }
    }
</script>