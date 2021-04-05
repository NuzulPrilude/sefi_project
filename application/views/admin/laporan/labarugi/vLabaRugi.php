    <section class="content-header">

      <h1>

       <?=@$judul?>

      </h1>

      <ol class="breadcrumb">

        <li><a href="<?=site_url('')?>"><i class="fa fa-print"></i> Laporan</a></li>

        <li class="active">Laba Rugi</li>

      </ol>

    </section>

    <section class="content">

      <div class="row">

        <div class="col-lg-12 col-xs-12">

      <div class="row">

        

          <section class="col-lg-9 col-xs-12">

            <div>

              <div class="box">

                  <div class="box-header with-border">
                    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-lg-12 col-xs-12">
          <div class="table-responsive">
          <h2 class="page-header">
            <table width="100%">
              <tr>
                <td>
                  <small class="pull-left"><img src="<?php echo base_url('assets/images/logo_rs.karmini.jpg') ?>" width="90px" height="90px" alt=""></small></td><td class="text-center">
                  <p style="font-size:16px"><b>LAPORAN LABA RUGI</b></p>
                  <p style="font-size:16px"><b>RSIA dr Hj. Karmini  TASIKMALAYA</b></p>
                  <!-- <p style="font-size:15px">PERIODE 31 AGUSTUS 2019 </p> -->
                  <p style="font-size:12px">Jl.Rumah Sakit Umum No.44 Telp.(0262)313388 Tasikmalaya</p>
                </td>
              </tr>

            </table>
          </h2>
        </div>
           
          
          <br>
          <div class="table-responsive">
            
          <table class="table table-bordered">
            <thead>
              <tr><td>Tanggal</td><td> <p class="ta" ></p> <p class="tb" ></p> </td> </tr>
            </thead>
              
              <tbody class="tabel_akun_401"></tbody>

              <tbody class="tabel_akun_402"></tbody>

              <tbody class="tabel_akun_403"></tbody>
              
              <tbody class="tabel_akun_404"></tbody>

              <tbody class="tabel_akun_405"></tbody>

              <tbody class="tabel_akun_406"></tbody>

              <tbody class="tabel_akun_501"></tbody>

              <tbody class="tabel_akun_502"></tbody>
              
              <tbody class="tabel_akun_503"></tbody>


              <tfoot>
            <tr>
              <td>Pendapatan Kotor</td><th class="text-right total_laba_kotor"></th>
              </tr>
              <tr>
              <td>Pendapatan Bersih</td><th class="text-right total_laba_bersih"></th>
              </tr>
              <tr>
              <td>Piutang BPJS</td><td class="text-right piutang_bpjs"></td>
              </tr>
               <!-- <tr>
              <td>TOTAL Pendapatan Komprehensif untuk periode ini</td><td class="text-right total_laba_komprehensif"></td>
              </tr> -->
            </tfoot>
          </table>
          
          <div>
            <a href="javascript:void(0)" class="btn btn-danger btn-block btn-flat btn-print-we"><i class="fa fa-print"></i> Print</a>
          </div>
        </div>
        <!-- /.col -->
      </div>
    </div>

      <!-- untuk print-->
      <div id="section_print" class="print" style="display: none;">
      <div class="row">
        <div class="col-lg-12 col-xs-12">
          <div class="table-responsive">
          <h2 class="page-header">
            <table width="100%">
              <tr>
                <td>
                  <small class="pull-left"><img src="<?php echo base_url('assets/images/logo_rs.karmini.jpg') ?>" width="90px" height="90px" alt=""></small></td><td class="text-center">
                  <p style="font-size:16px"><b>LAPORAN LABA RUGI</b></p>
                  <p style="font-size:16px"><b>RSIA dr Hj. Karmini  TASIKMALAYA</b></p>
                  <!-- <p style="font-size:15px">PERIODE 31 AGUSTUS 2019 </p> -->
                  <p style="font-size:12px">Jl.Rumah Sakit Umum No.44 Telp.(0262)313388 Tasikmalaya</p>
                </td>
                 
              </tr>

            </table>
          </h2>
        </div>
           
          
          <br>
          <div class="table-responsive">
            
          <table class="table table-bordered">
              <thead>
              <tr><td>Tanggal</td><td> <p class="ta" ></p> <p class="tb" ></p> </td> </tr>
            </thead>
              
              <tbody class="tabel_akun_401"></tbody>

              <tbody class="tabel_akun_402"></tbody>

              <tbody class="tabel_akun_403"></tbody>
              
              <tbody class="tabel_akun_404"></tbody>

              <tbody class="tabel_akun_405"></tbody>

              <tbody class="tabel_akun_406"></tbody>

              <tbody class="tabel_akun_501"></tbody>

              <tbody class="tabel_akun_502"></tbody>
              
              <tbody class="tabel_akun_503"></tbody>


              
          </table>
          <table class="table table-bordered">

          <tfoot>
            <tr>
              <td>Pendapatan Kotor</td><th class="text-right total_laba_kotor"></th>
              </tr>
              <tr>
              <td>Pendapatan Bersih</td><th class="text-right total_laba_bersih"></th>
              </tr>
              <!--  <tr>
              <td>TOTAL Pendapatan Komprehensif untuk periode ini</td><td class="text-right total_laba_komprehensif"></td>
              </tr> -->
              <tr>
              <td>Piutang BPJS</td><td class="text-right piutang_bpjs"></td>
              </tr>
            </tfoot>
            </table>
        </div>
        <!-- /.col -->
      </div>
    </div>
  </div>
    <!-- batas -->

        </section>
          </div>

              </div>
            </div>

          </section>
            
            <section class="col-lg-3 col-xs-12">

            <div>

              <div class="box">

                <div class="box-header with-border">
                  <div>
                  <label for="">Dari Tanggal</label>
                  <div class="form-group">
                      <input type="date" class="form-control" name="first_date">
                  </div>
                  </div>
                  
                  <div>
                  <label for="">Sampai Tanggal</label>
                  <div class="form-group">
                      <input type="date" class="form-control" name="second_date">
                  </div>
                  </div>

                  <div class="footer">
                    <div>
                      <a href="" class="btn btn-danger btn-block btn-flat btn-print-we">Cetak</a>
                    </div>
                  </div>

                </div>
            </div>
          </div>
        </section>
          

          </div>
        </div>
      </div>

  </section>

  <!-- <link rel="stylesheet" href="<?=base_url('assets/custom_print/print_LR.css')?>"> -->


  <style>
    @media print {
    @page {
        size: A4 Portrait;
        /*margin: 0.2cm;*/
        margin-top: 0.5cm;
        margin-left: 0.2cm;
        margin-right: 0.2cm;
        margin-bottom: 0.5cm;
    }
    body * {
        visibility: hidden;
    }
    .ada {
        visibility: visible !important;
    }
    .tidak {
        visibility: hidden !important;
    }
    #section_print, #section_print * {
        visibility: visible;
    }
    #section_print {
        position: absolute !important;
        display: block !important;
        left: 0;
        top: 0;
        width: 100%;
        height: 99%;
        padding-left: 1.2cm;
        padding-right: 1.2cm;
        /*margin-bottom: 0.2cm;*/
    }
    .waw {
        padding-top: 1cm;
    }
    th {
        padding: 0.1cm;
        font-size: 0.5cm;
    }
    td {
        padding: 0.1cm;
        font-size: 0.4cm;
    }
    }
    .warna {
        background-color: #00BFFF !important;
    }
</style>

  <script>
    var url = window.location.href;
    var btn_print = $('.btn-print-we');
    var tabel_akun_401 = $('.tabel_akun_401');
    var tabel_akun_402 = $('.tabel_akun_402');
    var tabel_akun_403 = $('.tabel_akun_403');
    var tabel_akun_404 = $('.tabel_akun_404');
    var tabel_akun_405 = $('.tabel_akun_405');
    var tabel_akun_406 = $('.tabel_akun_406');


    var tabel_akun_501 = $('.tabel_akun_501');
    var tabel_akun_502 = $('.tabel_akun_502');
    // var tabel_akun_503 = $('.tabel_akun_503');
    var total_401 = $('.total_401');
    var total_402 = $('.total_402');
    var total_403 = $('.total_403');
    var total_404 = $('.total_404');
    var total_405 = $('.total_405');

    var total_501 = $('.total_501');
    var total_502 = $('.total_502');

    var total_laba_kotor        = $('.total_laba_kotor');
    var total_laba_bersih       = $('.total_laba_bersih');
    var total_laba_komprehensif = $('.total_laba_komprehensif');
    var first_date              = $('[name="first_date"]');
    var second_date             = $('[name="second_date"]');
    var ta                      = $('.ta');
    var tb                      = $('.tb');


    $(function() {
      ta.text(first_date.val());
      tb.text(first_date.val());
      pen_401();
      pen_402();
      pen_403();
      pen_404();
      pen_405();
      pen_406();

      pen_501();
      pen_502();
      // pen_503();
      // pen_504();

      total_akhir();

      btn_print.on('click', function(e) {
            window.print();

        });

      first_date.on('change', function(e) {

        var tanggal_na = '' + first_date.val() + '-' + second_date.val()   + '';

        ta.text( tanggal_na );
        
        pen_401();
        pen_402();
        pen_403();
        pen_404();
        pen_405();
        pen_501();
        pen_502();
        total_akhir();

           

        });

      second_date.on('change', function(e) {

        var tanggal_na = '' + first_date.val() + '-' + second_date.val()   + '';

        ta.text( tanggal_na );


        pen_401();
        pen_402();
        pen_403();
        pen_404();
        pen_405();
        pen_501();
        pen_502();
        total_akhir();

        });

    });


function pen_401() {
    var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
    tabel_akun_401.html(ls);
    var total = 0;
    $.ajax({
        url: url + '/list_LR_4',
        type: "GET",
        dataType: "JSON",
        data: {
            id_akun: 401,
            tanggala: first_date.val(),
            tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    var ikeh = '';

                    for (var a = 0; a < r.data[i].sub.length; a++) {
                        ikeh += '<tr>' + '<td>&nbsp&nbsp' + '(' + r.data[i].sub[a].id_akun +')' + r.data[i].sub[a].nama_akun + '</td>'+ '<td class="text-right" colspan="3">' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';
                        total += Number(r.data[i].sub[a].total_saldo);

                    }
                    ls += '<tr>' + '<td>' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';
                    ls += '<tr>' + '<td style="color:red; colspan="3">' + 'Total Pendapatan 401' + '</td>' + '<td style="color:red; colspan="3" class="text-right">' + convertToRupiah(total) + '</td>' + '</tr>';

              // ls += '<tfoot>';
              // ls += '<tr>';
              // ls += '<td colspan="3">Total Pendapatan Operasional Rawat Inap</td><th class="text-right" colspan="2">Rp. 0 ,00</th>';
              // ls += '</tr>';
              // ls += '</tfoot>';

                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="6">..Tidak ada data..</td>' + '</tr>';
            }
         
            tabel_akun_401.html(ls);
           
        }
    });
}

function pen_402() {
    var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
    tabel_akun_402.html(ls);
    var total = 0;
    $.ajax({
        url: url + '/list_LR_4',
        type: "GET",
        dataType: "JSON",
        data: {
            id_akun: 402,
            tanggala: first_date.val(),
            tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    var ikeh = '';

                    for (var a = 0; a < r.data[i].sub.length; a++) {
                        ikeh += '<tr>' + '<td>&nbsp&nbsp' + '(' + r.data[i].sub[a].id_akun +')' + r.data[i].sub[a].nama_akun + '</td>'+ '<td class="text-right">' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';
                        total += Number(r.data[i].sub[a].total_saldo);

                    }
                    ls += '<tr>' + '<td colspan="2" >' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';
                    ls += '<tr>' + '<td style="color:red; colspan="3">' + 'Total Pendapatan Operasional Rawat Inap' + '</td>' + '<td style="color:red; colspan="3" class="text-right">' + convertToRupiah(total) + '</td>' + '</tr>';

                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="6">..Tidak ada data..</td>' + '</tr>';
            }
         
            tabel_akun_402.html(ls);
           
        }
    });
}

function pen_403() {
    var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
    tabel_akun_403.html(ls);
    var total = 0;
    $.ajax({
        url: url + '/list_LR_4',
        type: "GET",
        dataType: "JSON",
        data: {
            id_akun: 403,
            tanggala: first_date.val(),
            tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    var ikeh = '';

                    for (var a = 0; a < r.data[i].sub.length; a++) {
                        ikeh += '<tr>' + '<td>&nbsp&nbsp' + '(' + r.data[i].sub[a].id_akun +')' + r.data[i].sub[a].nama_akun + '</td>'+ '<td class="text-right" colspan="3">' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';
                        total += Number(r.data[i].sub[a].total_saldo);

                    }
                    ls += '<tr>' + '<td colspan="2">' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';
                    ls += '<tr>' + '<td style="color:red; colspan="3">' + 'Total Pendapatan Tindakan Medis' + '</td>' + '<td style="color:red; colspan="3" class="text-right">' + convertToRupiah(total) + '</td>' + '</tr>';
                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="6">..Tidak ada data..</td>' + '</tr>';
            }
         
            tabel_akun_403.html(ls);
           
        }
    });
}

function pen_404() {
    var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
    tabel_akun_404.html(ls);
    var total = 0 ;
    $.ajax({
        url: url + '/list_LR_4',
        type: "GET",
        dataType: "JSON",
        data: {
            id_akun: 404,
            tanggala: first_date.val(),
            tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    var ikeh = '';

                    for (var a = 0; a < r.data[i].sub.length; a++) {
                        ikeh += '<tr>' + '<td>&nbsp&nbsp' + '(' + r.data[i].sub[a].id_akun +')' + r.data[i].sub[a].nama_akun + '</td>'+ '<td class="text-right" colspan="3">' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';
                        total += Number(r.data[i].sub[a].total_saldo);
                    }
                    ls += '<tr>' + '<td colspan="2">' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';
                    ls += '<tr>' + '<td style="color:red; colspan="3">' + 'Total Pendapatan Operasional Unit Penunjang' + '</td>' + '<td style="color:red; colspan="3" class="text-right">' + convertToRupiah(total) + '</td>' + '</tr>';


                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="6">..Tidak ada data..</td>' + '</tr>';
            }
         
            tabel_akun_404.html(ls);

            // console.log(total);


           
        }
    });
}

function pen_405() {
    var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
    tabel_akun_405.html(ls);
    var total = 0;
    $.ajax({
        url: url + '/list_LR_4',
        type: "GET",
        dataType: "JSON",
        data: {
            id_akun: 405,
            tanggala: first_date.val(),
            tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    var ikeh = '';

                    for (var a = 0; a < r.data[i].sub.length; a++) {
                        ikeh += '<tr>' + '<td>&nbsp&nbsp' + '(' + r.data[i].sub[a].id_akun +')' + r.data[i].sub[a].nama_akun + '</td>'+ '<td class="text-right" colspan="3">' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';
                        total += Number(r.data[i].sub[a].total_saldo);

                    }
                    ls += '<tr>' + '<td colspan="2">' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';
                    ls += '<tr>' + '<td style="color:red; colspan="3">' + 'Total Pendapatan Usaha Lain - lain' + '</td>' + '<td style="color:red; colspan="3" class="text-right">' + convertToRupiah(total) + '</td>' + '</tr>';
                    console.log(total);
                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="6">..Tidak ada data..</td>' + '</tr>';
            }
         
            tabel_akun_405.html(ls);
           
        }
    });
}

function pen_406() {
    var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
    tabel_akun_406.html(ls);
    var total = 0;
    $.ajax({
        url: url + '/list_LR_Piutang',
        type: "GET",
        dataType: "JSON",
        data: {
            id_akun: 406,
            tanggala: first_date.val(),
            tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    var ikeh = '';

                    for (var a = 0; a < r.data[i].sub.length; a++) {
                        ikeh += '<tr>' + '<td>&nbsp&nbsp' + '(' + r.data[i].sub[a].id_akun +')' + r.data[i].sub[a].nama_akun + '</td>'+ '<td class="text-right" colspan="3">' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';
                        total += Number(r.data[i].sub[a].total_saldo);

                    }
                    ls += '<tr>' + '<td colspan="2">' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';
                    ls += '<tr>' + '<td style="color:red; colspan="3">' + 'Total Piutang' + '</td>' + '<td style="color:red; colspan="3" class="text-right">' + convertToRupiah(total) + '</td>' + '</tr>';
                    console.log(total);
                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="6">..Tidak ada data..</td>' + '</tr>';
            }
         
            tabel_akun_406.html(ls);
           
        }
    });
}


function pen_501() {
    var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
    tabel_akun_501.html(ls);
    var total = 0;
    $.ajax({
        url: url + '/list_LR_5',
        type: "GET",
        dataType: "JSON",
        data: {
            id_akun: 501,
            tanggala: first_date.val(),
            tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    var ikeh = '';

                    for (var a = 0; a < r.data[i].sub.length; a++) {
                        ikeh += '<tr>'+  '<td>&nbsp&nbsp' + '('  + r.data[i].sub[a].id_akun + ')'  + r.data[i].sub[a].nama_akun + '</td>'+ '<td class="text-right" colspan="3">' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';
                        total += Number(r.data[i].sub[a].total_saldo);

                    }

                    ls += '<tr>' + '<td colspan="2">' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';
                    ls += '<tr>' + '<td style="color:red; colspan="3">' + 'Total Biaya' + '</td>' + '<td style="color:red; colspan="3" class="text-right">' + convertToRupiah(total) + '</td>' + '</tr>';
                    
                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="6">..Tidak ada data..</td>' + '</tr>';
            }
         
            tabel_akun_501.html(ls);
           
        }
    });
}

function pen_502() {
    var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
    tabel_akun_502.html(ls);
    var total = 0;
    $.ajax({
        url: url + '/list_LR_5',
        type: "GET",
        dataType: "JSON",
        data: {
            id_akun: 502,
            tanggala: first_date.val(),
            tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    var ikeh = '';

                    for (var a = 0; a < r.data[i].sub.length; a++) {
                        ikeh += '<tr>'+  '<td>&nbsp&nbsp' + '('  + r.data[i].sub[a].id_akun + ')'  + r.data[i].sub[a].nama_akun + '</td>'+ '<td class="text-right" colspan="3">' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';
                        total += Number(r.data[i].sub[a].total_saldo);

                    }
                    ls += '<tr>' + '<td colspan="2">' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';

                    ls += '<tr>' + '<td style="color:red; colspan="3">' + 'Total Biaya Umum Dan Administrasi' + '</td>' + '<td style="color:red; colspan="3" class="text-right">' + convertToRupiah(total) + '</td>' + '</tr>';
                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="6">..Tidak ada data..</td>' + '</tr>';
            }
         
            tabel_akun_502.html(ls);
           
        }
    });
}

// function pen_503() {
//     var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
//     tabel_akun_503.html(ls);
       // var total = 0;
//     $.ajax({
//         url: url + '/list_LR_5',
//         type: "GET",
//         dataType: "JSON",
//         data: {
//             id_akun: 503,
//             // tanggala: tanggala.val(),
//             // tanggalb: tanggalb.val(),
//         },
//         success: function(r) {
//             if (r.status == 'ada') {
//                 ls = '';
//                 for (var i = 0; i < r.data.length; i++) {
//                     var ikeh = '';

//                     for (var a = 0; a < r.data[i].sub.length; a++) {
//                         ikeh += '<tr>'+  '<td>&nbsp&nbsp' + '('  + r.data[i].sub[a].id_akun + ')'  + r.data[i].sub[a].nama_akun + '</td>'+ '<td class="text-right" colspan="3">' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';
                        // total += Number(r.data[i].sub[a].total_saldo);

//                     }

//                     ls += '<tr>' + '<td>' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';
//                 }
//             } else {
//                 ls = '<tr>' + '<td class="text-center" colspan="6">..Tidak ada data..</td>' + '</tr>';
//             }
         
//             tabel_akun_503.html(ls);
           
//         }
//     });
// }

// function pen_504() {
//     var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
//     tabel_akun_504.html(ls);
   
//     $.ajax({
//         url: url + '/list_LR_5',
//         type: "GET",
//         dataType: "JSON",
//         data: {
//             id_akun: 504,
//             // tanggala: tanggala.val(),
//             // tanggalb: tanggalb.val(),
//         },
//         success: function(r) {
//             if (r.status == 'ada') {
//                 ls = '';
//                 for (var i = 0; i < r.data.length; i++) {
//                     var ikeh = '';

//                     for (var a = 0; a < r.data[i].sub.length; a++) {
//                         ikeh += '<tr>'+  '<td>&nbsp&nbsp' + '('  + r.data[i].sub[a].id_akun + ')'  + r.data[i].sub[a].nama_akun + '</td>'+ '<td class="text-right" colspan="3">' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';
//                     }

//                     ls += '<tr>' + '<td>' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';
//                 }
//             } else {
//                 ls = '<tr>' + '<td class="text-center" colspan="6">..Tidak ada data..</td>' + '</tr>';
//             }
         
//             tabel_akun_504.html(ls);
           
//         }
//     });
// }


function total_akhir() {
    $.ajax({
        url: url + '/hitung_pendapatan_bersih',
        type: "GET",
        dataType: "JSON",
        data: {
            tanggala: first_date.val(),
            tanggalb: second_date.val(),
        },
        success: function(r) {
            
            total_laba_kotor.html(convertToRupiah(r.total_laba_kotor));
            total_laba_bersih.html(convertToRupiah(r.total_laba_bersih));
            total_laba_komprehensif.html(convertToRupiah(r.total_laba_bersih));
           
        }
    });
}

function convertToRupiah(angka) {
  var h = angka;
    var rupiah = '';

    if (h == null || h == ''){
      return 'Rp.0,00';
    }else{
      var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++)
        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }

    
}


    
  </script>

