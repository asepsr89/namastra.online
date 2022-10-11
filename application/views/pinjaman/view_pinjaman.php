<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row lg">
                <div class="col">
                    <div class="alert alert-primary" role="alert">
                        <i class="nav-icon fas fa-user"></i>
                        Data Pinjaman
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Table Pinjaman</h3>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('massage'); ?>
                            <?= form_open_multipart(base_url('pinjaman/uploaddata')) ?>
                            <div class="input-group mb-3">
                                <div class="row">
                                    <div class="col-lg-9 mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="importexcel" name="importexcel" accept=".xlsx,.xls">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <button type="submit" class="btn btn-success">Import</button>
                                    </div>
                                    <row>
                                </div>
                                <?= form_close(); ?>
                                <div class="table-responsive">
                                    <table id="tabledepo" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor Fasilitas</th>
                                                <th>Nomor Anggota</th>
                                                <th>Cabang</th>
                                                <th>Nama Produk</th>
                                                <th>Nomor Perjanjian</th>
                                                <th>Nama Anggota</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Jatuh Tempo</th>
                                                <th>Jangka Waktu</th>
                                                <th>Nominal Fasilitas</th>
                                                <th>Saldo Akhir</th>
                                                <th>Nama AO</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pinjaman as $p) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $p->no_pasilitas; ?></td>
                                                    <td><?php echo $p->no_anggota; ?></td>
                                                    <td><?php echo $p->cabang; ?></td>
                                                    <td><?php echo $p->no_perjanjian; ?></td>
                                                    <td><?php echo $p->produk_pinjaman; ?></td>
                                                    <td><?php echo $p->nama_anggota; ?></td>
                                                    <td><?php echo $p->tgl_pinjam; ?></td>
                                                    <td><?php echo $p->jatem; ?></td>
                                                    <td><?php echo $p->jangka_waktu; ?></td>
                                                    <td><?php echo $p->fasilitas; ?></td>
                                                    <td><?php echo $p->saldo_akhir; ?></td>
                                                    <td><?php echo $p->nama_ao; ?></td>
                                                    <td>
                                                        <a href="#" data-href="#" class="btn btn-sm btn-danger hapus">
                                                            Hapus
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                </br>

                            </div>
                            <div class="col-6 mb-3">
                                <a href="#" class="btn btn-danger w-100 hapusall" data-href="<?php echo base_url(); ?>pinjaman/hapusPinjamanAll">
                                    Hapus All Data
                                </a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </section>
</div>

<!-- Modal Hapus All Depo-->
<div class="modal modal-blur fade" id="modalhapuspinjamanall" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Apakah anda yakin semua data ?</div>
                <div>Jika di Hapus data akan hilang</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <a href="#" id="hapuspinjamanalldepo" class="btn btn-danger">Hapus Data</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $(document).ready(function() {
            $('#tabledepo').DataTable();
        });
        $(".hapusall").click(function() {
            var href = $(this).attr("data-href");
            $("#modalhapuspinjamanall").modal("show");
            $("#hapuspinjamanalldepo").attr("href", href);
        });
    });
</script>