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
                        <form id="form-view" name="form-view" method="post">
                            <div class="card-body">
                                <div class="tabs">
                                    <input type="radio" id="tab1" name="tab-control" checked>
                                    <input type="radio" id="tab2" name="tab-control">
                                    <input type="radio" id="tab3" name="tab-control">
                                    <input type="radio" id="tab4" name="tab-control">
                                    <ul>
                                        <li title="profil">
                                            <label for="tab1" role="button" id="tabs-profil">
                                                <i class="fas fa-brain"></i>
                                                <br><span>Profil</span>
                                            </label>
                                        </li>
                                        <li title="pengurus">
                                            <label for="tab2" role="button" id="tabs-pengurus">
                                                <i class="fa fa-users"></i>
                                                <br><span>Pengurus</span>
                                            </label>
                                        </li>
                                        <li title="kepemilikan">
                                            <label for="tab3" role="button" id="tabs-kepemilikan">
                                                <i class="fas fa-code-branch"></i>
                                                <br><span>Kepemilikan</span>
                                            </label>
                                        </li>
                                        <li title="aset">
                                            <label for="tab4" role="button" id="tabs-aset">
                                                <i class="fas fa-list-ul"></i>
                                                <br><span>Aset</span>
                                            </label>
                                        </li>
                                    </ul>
                                    <div class="slider">
                                        <div class="indicator"></div>
                                    </div>
                                    <div class="content">
                                        <section id="tab-profil">
                                            <div class="row">
                                                <div class="col-md-4 px-3 border-right border-default">
                                                    <div class="form-group">
                                                        <input id="view-id" class="form-control" type="text" name="id" hidden readonly>
                                                        <label for="view-nama_perusahaan" class="">Nama Perusahaan </label>
                                                        <input id="view-nama_perusahaan" class="form-control" type="text" name="nama_perusahaan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="view-badan_usaha">Bentuk Usaha</label>
                                                        <select name="badan_usaha" id="view-badan_usaha" class="form-control">
                                                            <option value="PT">PT</option>
                                                            <option value="CV">CV</option>
                                                            <option value="Belum Memiliki Badan Usaha">Belum Memiliki Badan Usaha</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="view-tahun_berdiri">Tahun Berdiri</label>
                                                        <input type="number" class="form-control" id="view-tahun_berdiri" name="telp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="view-pegawai_tetap">Jumlah Pegawai Tetap</label>
                                                        <input type="number" class="form-control" id="view-pegawai_tetap" name="pegawai_tetap">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="view-pegawai_tidak_tetap">Jumlah Pegawai Tidak Tetap</label>
                                                        <input type="number" class="form-control" id="view-pegawai_tidak_tetap" name="pegawai_tidak_tetap">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="view-kota">Kota / Kabupaten</label>
                                                        <input type="text" class="form-control" id="view-kota" name="kota">
                                                    </div>

                                                </div>
                                                <div class="col-md-8 px-3">
                                                    <div class="form-group">
                                                        <label for="view-email">Email</label>
                                                        <input type="text" class="form-control" id="view-email" name="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="view-telp">No. Telepon</label>
                                                        <input type="number" class="form-control" id="view-telp" name="telp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="view-alamat">Alamat Kantor</label>
                                                        <input id="view-alamat" class="form-control" type="text" name="alamat">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="view-website">Alamat Produksi</label>
                                                        <input id="view-website" class="form-control" type="text" name="website">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="view-website">Website</label>
                                                        <input id="view-website" class="form-control" type="text" name="website">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="view-media_sosial">Sosial Media</label>
                                                        <input id="view-media_sosial" class="form-control" type="text" name="media_sosial">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <section id="tab-pengurus">
                                            <div class="form-group">
                                                <select name="" id="">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </section>
                                        <section id="tab-kepemilikan">
                                            <div class="form-group">
                                                <label for="view-keunggulan_keunikan">Keunggulan & Keunikan</label>
                                                <textarea name="keunggulan_keunikan" id="view-keunggulan_keunikan" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="view-kegunaan_manfaat">Kegunaan & Manfaat</label>
                                                <textarea name="kegunaan_manfaat" id="view-kegunaan_manfaat" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="view-spesifikasi_teknis">Spesifikasi Teknis</label>
                                                <textarea name="spesifikasi_teknis" id="view-spesifikasi_teknis" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="view-keterbaruan_produk">Keterbaharuan Produk</label>
                                                <textarea id="view-keterbaruan_produk" name="keterbaruan_produk" class="form-control"></textarea>
                                            </div>
                                        </section>
                                        <section id="tab-aset">
                                            <div class="form-group">
                                                <label for="view-teknologi_yang_dikembangkan">Teknologi yang Dikembangkan</label>
                                                <textarea id="view-teknologi_yang_dikembangkan" name="teknologi_yang_dikembangkan" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="view-rencana_pengembangan">Rencana Pengembangan</label>
                                                <textarea id="view-rencana_pengembangan" name="rencana_pengembangan" class="form-control"></textarea>
                                            </div>
                                            <!-- CK EDITOR GROUP END -->
                                            <div class="form-group">
                                                <label for="view-kesiapan_teknologi">Kesiapan Teknologi</label>
                                                <select class="custom-select" name="kesiapan_teknologi" id="view-kesiapan_teknologi">
                                                    <option selected disabled>Pilih salah satu</option>
                                                    <option value="masih riset">Masih Riset</option>
                                                    <option value="prototype">Prototype</option>
                                                    <option value="siap komersil">Siap Komersil</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="view-kepemilikan_teknologi">Kepemilikan Teknologi</label>
                                                <select class="custom-select" name="kepemilikan_teknologi" id="view-kepemilikan_teknologi">
                                                    <option selected disabled>Pilih salah satu</option>
                                                    <option value="sendiri">Sendiri </option>
                                                    <option value="instansi">Instansi</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="view-pemilik_teknologi">Nama Pemilik Teknologi</label>
                                                <input id="view-pemilik_teknologi" class="form-control" type="text" name="pemilik_teknologi">
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" id="btn-save" type="submit">Simpan Perubahan</button>
                            </div>
                        </form>
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
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: api + 'service/produk/get/<?= $id ?>',
            success: function(response) {
                let data = response.data
                for (key in data) {
                    $(`#view-${key}`).val(data[key])
                }
                $('#prev-view-logo_produk').attr('src', response.data.logo_produk)

                editor('#view-latar_belakang')
                $('#view-latar_belakang').html(data.latar_belakang)

                editor('#view-deskripsi_lengkap')
                $('#view-deskripsi_lengkap').html(data.deskripsi_lengkap)

                editor('#view-masalah')
                $('#view-masalah').html(data.masalah)

                editor('#view-keunggulan_keunikan')
                $('#view-keunggulan_keunikan').html(data.keunggulan_keunikan)

                editor('#view-keterbaruan_produk')
                $('#view-keterbaruan_produk').html(data.keterbaruan_produk)

                editor('#view-solusi')
                $('#view-solusi').html(data.solusi)

                editor('#view-spesifikasi_teknis')
                $('#view-spesifikasi_teknis').html(data.spesifikasi_teknis)

                editor('#view-kegunaan_manfaat')
                $('#view-kegunaan_manfaat').html(data.kegunaan_manfaat)

                editor('#view-teknologi_yang_dikembangkan')
                $('#view-teknologi_yang_dikembangkan').html(data.teknologi_yang_dikembangkan)

                editor('#view-rencana_pengembangan')
                $('#view-rencana_pengembangan').html(data.rencana_pengembangan)

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