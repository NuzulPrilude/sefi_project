    <section class="content-header">

      <h1>

       <?=@$judul?>

      </h1>

      <ol class="breadcrumb">

        <li><a href="<?=site_url('')?>"><i class="fa fa-print"></i> Laporan</a></li>

        <li class="active">Neraca</li>

      </ol>

    </section>

    <section class="content">

      <div class="row">

        <div class="col-lg-12 col-xs-12">

          <div>

              <div class="box">

                <div class="box-header with-border">
                  <div class="col-md-6" >
                  <label for="">Dari Tanggal</label>
                  <div class="form-group">
                      <input type="date" class="form-control" name="first_date">
                  </div>
                  </div>
                  
                  <div class="col-md-6">
                  <label for="">Sampai Tanggal</label>
                  <div class="form-group">
                      <input type="date" class="form-control" name="second_date">
                  </div>
                  </div>

                </div>
            </div>
          </div>

      <div class="row">

          <section class="col-lg-12 col-xs-12">
            
            <div>

              <div class="box">

                  <div class="box-header with-border">
                    <div class="box-title">
                      <!-- <a title="Export to Excel" href="javascript:void(0)" class="btn-print-excel"><i class="fa fa-print"></i></a> -->
                    </div>
                    <section class="invoice">
      <!-- title row -->
      <div class="table-responsive">
                          <h2 class="page-header">
                            <table width="100%">
                              <tr>
                                <td>
                                  <small class="pull-left"><img src="" width="90px" height="70px" alt=""></small></td><td class="text-center">
                                  <p style="font-size:16px"><b>NERACA RSIA dr Hj. Karmini,. EH</b></p>
                                  <!-- <p style="font-size:15px">PERIODE 31 AGUSTUS 2019 </p> -->
                                  <p style="font-size:15px" class="ta" ></p>
                                  <p style="font-size:12px">Jl.Rumah Sakit Umum No.44 Telp.(0262)313388 Tasikmalaya</p>
                                </td>
                                  <td>
                                    <small class="pull-right"><img src="" width="70px" height="70px" alt=""></small>
                                  </td>
                              </tr>
                            </table>
                          </h2>
                        </div>
                      <div class="row">
                        <div class="col-lg-6 col-xs-12">
                          <div class="table-responsive">
                          <h2 class="page-header">
                            <table width="100%">
                              <tr>
                                <td>
                                  <small class="pull-left"><img src="" width="90px" height="70px" alt=""></small></td><td class="text-center">
                                  <p style="font-size:16px"><b>AKTIVA</b></p>
                                </td>
                                  <td>
                                    <small class="pull-right"><img src="" width="70px" height="70px" alt=""></small>
                                  </td>
                              </tr>
                            </table>
                          </h2>
                        </div>
                          <br>
							<!-- Aktiva lancar -->
                          <div class="table-responsive">
                            <table class="table table-bordered">
                           
                              <tbody class="ada-apa-denganmu"></tbody>

                          </table>

                        </div>

							<!-- aktiva tetap -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                              <tbody class="tabel_aktiva_tetap"></tbody>
                          </table>
                        </div>
						
						<!-- total aktiva -->

                        <div class="table-responsive">
                            <table class="table table-bordered">
                            <tfoot>
                               <tr>
                              <td>TOTAL AKTIVA</td>
                              <input type="hidden" readonly name="aset_lancar">
                              <input type="hidden" readonly name="aset_tetap">
                              <td class="tot_akhir"></td>
                              </tr>
                            </tfoot>
                          </table>

                        </div>

                        </div>
                        

                        <div class="col-lg-6 col-xs-12">
                          <div class="table-responsive">
                          <h2 class="page-header">
                          	<!-- hutang -->
                            <table width="100%">
                              <tr>
                                <td>
                                  <small class="pull-left"><img src="" width="90px" height="70px" alt=""></small></td><td class="text-center">
                                  <p style="font-size:16px"><b>HUTANG</b></p>
                                </td>
                                  <td>
                                    <small class="pull-right"><img src="" width="70px" height="70px" alt=""></small>
                                  </td>
                              </tr>
                            </table>
                          </h2>
                        </div>
                          <br>
                          <div class="table-responsive">
                            <table class="table table-bordered">
                              <tbody class="tabel_jangka_panjang"></tbody>
                            
                          </table>
                        </div>
                          <div>
                            <a href="javascript:void(0)" class="btn btn-danger btn-block btn-flat btn-print-we"><i class="fa fa-print"></i> Print</a>
                          </div>

                        </div>

                        <!-- /.col -->
                      </div>


        </section>
          </div>

              </div>
            </div>

          </section>

          <!-- <section class="col-lg-3 col-xs-12">

            
        </section> -->

          </div>
        </div>
      </div>

      <div>
      </div>
  
     <div class="row">
      <div id="section_print" style="display: none;"  class="print">
       <div class="col-lg-12 col-xs-12">

      <div class="row">

          <section class="col-lg-12 col-xs-12">
            
            <div>

              <div class="box">

                  <div class="box-header with-border">
                    <div class="box-title">
                      <!-- <a title="Export to Excel" href="javascript:void(0)" class="btn-print-excel"><i class="fa fa-print"></i></a> -->
                    </div>
                    <section class="invoice">
      <!-- title row -->
      <div class="table-responsive">
                          <h2 class="page-header">
                            <table width="100%">
                              <tr>
                                <td>
                                  <small class="pull-left"><img src="" width="90px" height="70px" alt=""></small></td><td class="text-center">
                                  <p style="font-size:16px"><b>NERACA RSIA dr Hj. Karmini,. EH</b></p>
                                  <!-- <p style="font-size:15px">PERIODE 31 AGUSTUS 2019 </p> -->
                                  <p style="font-size:15px" class="ta" ></p>
                                  <p style="font-size:12px">Jl.Rumah Sakit Umum No.44 Telp.(0262)313388 Tasikmalaya</p>
                                </td>
                                  <td>
                                    <small class="pull-right"><img src="" width="70px" height="70px" alt=""></small>
                                  </td>
                              </tr>
                            </table>
                          </h2>
                        </div>
                      <div class="row">
                        <div class="col-lg-6 col-xs-12">
                          <div class="table-responsive">
                          <h2 class="page-header">
                            <table width="100%">
                              <tr>
                                <td>
                                  <small class="pull-left"><img src="" width="90px" height="70px" alt=""></small></td><td class="text-center">
                                  <p style="font-size:16px"><b>AKTIVA</b></p>
                                </td>
                                  <td>
                                    <small class="pull-right"><img src="" width="70px" height="70px" alt=""></small>
                                  </td>
                              </tr>
                            </table>
                          </h2>
                        </div>
                          <br>
							<!-- Aktiva lancar -->
                          <div class="table-responsive">
                            <table class="table table-bordered">
                           
                              <tbody class="ada-apa-denganmu"></tbody>

                          </table>

                        </div>

							<!-- aktiva tetap -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                              <tbody class="tabel_aktiva_tetap"></tbody>
                          </table>
                        </div>
						
						<!-- total aktiva -->

                        <div class="table-responsive">
                            <table class="table table-bordered">
                            <tfoot>
                               <tr>
                              <td>TOTAL AKTIVA</td>
                              <input type="hidden" readonly name="aset_lancar">
                              <input type="hidden" readonly name="aset_tetap">
                              <td class="tot_akhir"></td>
                              </tr>
                            </tfoot>
                          </table>

                        </div>

                        </div>
                        

                        <div class="col-lg-6 col-xs-12">
                          <div class="table-responsive">
                          <h2 class="page-header">
                          	<!-- hutang -->
                            <table width="100%">
                              <tr>
                                <td>
                                  <small class="pull-left"><img src="" width="90px" height="70px" alt=""></small></td><td class="text-center">
                                  <p style="font-size:16px"><b>HUTANG</b></p>
                                </td>
                                  <td>
                                    <small class="pull-right"><img src="" width="70px" height="70px" alt=""></small>
                                  </td>
                              </tr>
                            </table>
                          </h2>
                        </div>
                          <br>
                          <div class="table-responsive">
                            <table class="table table-bordered">
                              <tbody class="tabel_jangka_panjang"></tbody>
                            
                          </table>
                        </div>
                        </div>

                        <!-- /.col -->
                      </div>


        </section>
          </div>

              </div>
            </div>

          </section>

          </div>
        </div>             
                             

      </div>
     </div>

  </section>

   <link rel="stylesheet" href="<?=base_url('assets/custom_print/print_neraca.css')?>">
  <script>
var url = window.location.href;
    // var url = link.substring(0, link.lastIndexOf('/buat'));
var tabelnya = $('.ada-apa-denganmu');
var tabel_uang           = $('.ada-apa-dengan_uang');
var btn_print            = $('.btn-print-we');
var btnprintexcel        = $('.btn-print-excel');
var tabel_aktiva_tetap   = $('.tabel_aktiva_tetap');
var tabel_jangka_panjang = $('.tabel_jangka_panjang');
var total_aset_lancar  = $('[name="aset_lancar"]');
var total_aset_tetap   = $('[name="aset_tetap"]');
var tot_akhir          = $('.tot_akhir');
var first_date         = $('[name="first_date"]');
var second_date        = $('[name="second_date"]');
var ta                 = $('.ta');


$(function() {

  btn_print.on('click', function(e) {
        window.print();
    });
  btnprintexcel.on('click', (e) => {
        window.open(url + '/export_xls/?tanggala=' + first_date.val() + '&&tanggalb=' + second_date.val());
    });

  first_date.on('change', function(e) {


    var tanggal_na = '' + first_date.val() + '-' + second_date.val()   + '';

        ta.text( tanggal_na );

  aktiva_lancar();
  aktiva_tetap();
  hutang_jangka_panjang();
  total_akhir_aktiva();

  });

  second_date.on('change', function(e) {

    var tanggal_na = '' + first_date.val() + '-' + second_date.val()   + '';

        ta.text( tanggal_na );

  aktiva_lancar();
  aktiva_tetap();
  hutang_jangka_panjang();
  total_akhir_aktiva();

  
  });


  aktiva_lancar();
  aktiva_tetap();
  hutang_jangka_panjang();
  // total_akhir_aktiva();


});
  

  function aktiva_lancar() {
    var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
    tabelnya.html(ls);
    var total = 0;

    $.ajax({
        url: url + '/list_uang',
        type: "GET",
        dataType: "JSON",
        data: {
            id_akun: 101,
            parent_id: 0,
            tanggala: first_date.val(),
            tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    var ikeh = '';

                    for (var a = 0; a < r.data[i].sub.length; a++) {
                        ikeh += '<tr>' + '<td>&nbsp;&nbsp;' + r.data[i].sub[a].nama_akun + '</td>'+ '<td>' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';

                        total += Number(r.data[i].sub[a].total_saldo);
                        

                    }
                    ls += '<tr>' + '<td colspan="2">' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';
                    ls += '<tr>' + '<td>' + 'Jumlah Aktiva Lancar' + '</td>' + '<td class="text-right">' + convertToRupiah(total) + '</td>' + '</tr>';
                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="3">..Tidak ada data..</td>' + '</tr>';
            }

            total_aset_lancar.val(total);

            tabelnya.html(ls);
            total_akhir_aktiva();

           
        }
    });
}


function formatNumber(num) {
  return num.html().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}


function convertToAngka(rupiah)
{
  return parseInt(rupiah.replace(/[^0-9]/g, ''), 10);
}

function convertToRupiah(angka) {
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++)
        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
}

function aktiva_tetap() {
    var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
    tabel_aktiva_tetap.html(ls);
   var total = 0;
    $.ajax({
        url: url + '/list_uang',
        type: "GET",
        dataType: "JSON",
        data: {
            id_akun: 13 ,
            parent_id: 1,
            tanggala: first_date.val(),
            tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    var ikeh = '';

                    for (var a = 0; a < r.data[i].sub.length; a++) {
                        ikeh += '<tr>' + '<td> &nbsp;&nbsp;' + r.data[i].sub[a].nama_akun + '</td>'+ '<td>' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';
                        total += Number(r.data[i].sub[a].total_saldo);



                    }
                    ls += '<tr>' + '<td colspan="2">' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';
                    ls += '<tr>' + '<td>' + 'Jumlah Aktiva Tetap' + '</td>' + '<td class="text-right">' + convertToRupiah(total) + '</td>' + '</tr>';



                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="3">..Tidak ada data..</td>' + '</tr>';
            }
         
            tabel_aktiva_tetap.html(ls);

            total_aset_tetap.val(total);

            total_akhir_aktiva();


        }
    });
}

function total_akhir_aktiva()
{
  var a =  total_aset_lancar.val();
  var b = total_aset_tetap.val(); 
  var akhir = Number(a) + Number(b) ;

  // console.log( $('[name="aset_lancar"]').val() );

  tot_akhir.html( convertToRupiah(akhir)) ;
}


function hutang_jangka_panjang()
{
  var ls = '<tr>' + '<td class="text-center" colspan="6">..Tunggu Sebentar..</td>' + '</tr>';
    tabel_jangka_panjang.html(ls);
   var total = 0;
    $.ajax({
        url: url + '/list_uang',
        type: "GET",
        dataType: "JSON",
        data: {
            id_akun: 10201 ,
            parent_id: 4,
            tanggala: first_date.val(),
            tanggalb: second_date.val(),
        },
        success: function(r) {
            if (r.status == 'ada') {
                ls = '';
                for (var i = 0; i < r.data.length; i++) {
                    var ikeh = '';

                    for (var a = 0; a < r.data[i].sub.length; a++) {
                        ikeh += '<tr>' + '<td> &nbsp;&nbsp;' + r.data[i].sub[a].nama_akun + '</td>'+ '<td>' + convertToRupiah(Number(r.data[i].sub[a].total_saldo))  + '</td>'  + '</tr>';
                        total += Number(r.data[i].sub[a].total_saldo);

                    }
                    ls += '<tr>' + '<td colspan="2">' + r.data[i].nama_akun + '</td>' + '</tr>' + ikeh +  '</td>' + '</tr>';
                    ls += '<tr>' + '<td>' + 'Jumlah Hutang Dagang' + '</td>' + '<td class="text-right">' + convertToRupiah(total) + '</td>' + '</tr>';
                }
            } else {
                ls = '<tr>' + '<td class="text-center" colspan="3">..Tidak ada data..</td>' + '</tr>';
            }
         
            tabel_jangka_panjang.html(ls);
           
        }
    });
}

    
  </script>

