
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <div class="container-fluid">
        <span class="alert alert-blok alert-success">
            Jawab pertanyaan berikut ini untuk melakukan diagnosa penyakit berdasarkan gejala-gejala yang terjadi
        </span>
        <br><br>
        <div class="jumbotron">
            <div class="container-fluid">
                <p>
                    <strong>
                        <?php 
                            if($penyakit !=""){
                                if(empty($penyakit->nama_penyakit)){
                                    echo $penyakit;
                                }else{
                                    echo "<div class='row'>";
                                    echo '<div class="col-md-6">'; 
                                    echo "Anda terindikasi penyakit <div class='alert alert-danger'>".$penyakit->nama_penyakit."</div><br>";
                                    echo "Deskripsi : <br>";
                                    echo $penyakit->deskripsi;
                                    echo "Akibat : <br>";
                                    echo $penyakit->akibat;
                                    echo "Penanganan : <br>";
                                    echo $penyakit->penanganan;
                                    echo '</div>';

                                    echo '<div class="col-md-6">';
                                    echo "Penyebab : <br>";
                                    echo $penyakit->penyebab;
                                    echo "Link Video : <br>";
                                    echo '<a href="'.$penyakit->link_video.'"><i class="fa fa-eye"></i> Lihat Video</a>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                               
                            }else{
                                echo $diagnosa->pertanyaan;
                           }
                        ?>
                    </strong>
                </p>
            
            <div class="row">
                <?php if($penyakit == ""){ ?>
                    <form action="<?= base_url('diagnosa/proses/'.$diagnosa->gejala) ?>" method="post">
                        <strong><input type="radio" name="jawab" value="1"> <?= $diagnosa->is_yes ?></strong><br>
                        <strong><input type="radio" name="jawab" value="0"> <?= $diagnosa->is_no ?></strong><br>
                        <br><br>
                        <div class="pull-left">
                            <button type="submit" class="btn btn-primary">Proses</button>
                        </div>
                    </form>
                <?php }else{  ?>
                    <div class="pull-left">
                        <a href="<?= base_url('diagnosa') ?>" class="btn btn-warning"><i class="fa fa-refresh"></i> Diagnosa Ulang</a>
                    </div>
                <?php } ?>
            </div>
            </div>
        </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>


