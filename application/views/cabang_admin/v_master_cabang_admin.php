<?php
$page_title = "Admin Cabang";
$breadcrumb = array(
    "Master",$toko[0]["toko_nama"],$cabang[0]["cabang_daerah"],"Admin"
);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php $this->load->view('req/mm_css.php');?>
    </head>

    <body>
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <div class="wrapper theme-1-active pimary-color-pink">

            <?php $this->load->view('req/mm_menubar');?>

            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row mt-20">
                        <div class="col-lg-12 col-sm-12">
                            <div class="panel panel-default card-view">
                                <div class="panel-heading bg-gradient">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-light"><?php echo ucwords($page_title);?></h6>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Home</a></li>
                                        <?php for($a = 0; $a<count($breadcrumb); $a++):?>
                                        <?php if($a+1 != count($breadcrumb)):?>
                                        <li class="breadcrumb-item"><?php echo ucwords($breadcrumb[$a]);?></a></li>
                                        <?php else:?>
                                        <li class="breadcrumb-item active"><?php echo ucwords($breadcrumb[$a]);?></li>
                                        <?php endif;?>
                                        <?php endfor;?>
                                    </ol>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div class = "col-lg-12">
                                            <div class = "d-block">
                                                <a href = "<?php echo base_url();?>toko/cabang/<?php echo $toko[0]["id_pk_toko"];?>" style = "margin-right:10px" class = "btn btn-danger btn-sm col-lg-2 col-sm-12">Kembali ke Daftar Cabang</a>
                                                <button type = "button" class = "btn btn-primary btn-sm col-lg-2 col-sm-12" data-toggle = "modal" data-target = "#register_modal" style = "margin-right:10px">Tambah <?php echo ucwords($page_title);?></button>
                                            </div>
                                            <br/>
                                            <br/>
                                            <div class = "align-middle text-center d-block">
                                                <i style = "cursor:pointer;font-size:large;margin-left:10px" class = "text-primary md-edit"></i><b> - Edit </b>   
                                                <i style = "cursor:pointer;font-size:large;margin-left:10px" class = "text-danger md-delete"></i><b> - Delete </b>
                                               </div>
                                            <br/>
                                            <div class = "form-group">
                                                <h5>Search Data Here</h5>
                                                <input id = "search_box" placeholder = "Search data here..." type = "text" class = "form-control input-sm " onkeyup = "search()" style = "width:25%">
                                            </div>
                                            <div class = "table-responsive">
                                                <table class = "table table-bordered table-hover table-striped" id = "table_container">
                                                    <thead id = "col_title_container">
                                                    </thead>
                                                    <tbody id = "content_container">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-center" id = "pagination_container">
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('req/mm_footer.php');?>
                </div>
            </div>
        </div>
        <?php $this->load->view('req/mm_js.php');?>
    </body>
</html>
<script>
    var ctrl = "cabang_admin";
    var url_add = "id_cabang=<?php echo $id_cabang;?>";
</script>
<?php 
$data = array(
    "page_title" => "Admin Toko",
    "cabang" => $cabang
);
?>
<?php $this->load->view("_core_script/table_func");?>
<?php $this->load->view("_core_script/register_func");?>
<?php $this->load->view("_core_script/update_func");?>
<?php $this->load->view("_core_script/delete_func");?>
<?php $this->load->view('cabang_admin/f-add-cabang_admin',$data);?>
<?php $this->load->view('cabang_admin/f-update-cabang_admin',$data);?>
<?php $this->load->view('cabang_admin/f-delete-cabang_admin',$data);?>

<datalist id = 'daftar_user'></datalist>
<script>
    window.onload = function(){
        $.ajax({
            url:"<?php echo base_url();?>ws/user/list",
            type:"GET",
            dataType:"JSON",
            success:function(respond){
                var html = "";
                if(respond["status"] == "SUCCESS"){
                    for(var a = 0; a<respond["content"].length; a++){
                        html+="<option value = '"+respond['content'][a]["name"]+"'></option>";
                    }
                    $("#daftar_user").html(html);
                }
            }
        });
    }
    window.onfocus = function(){
        $.ajax({
            url:"<?php echo base_url();?>ws/user/list",
            type:"GET",
            dataType:"JSON",
            success:function(respond){
                var html = "";
                if(respond["status"] == "SUCCESS"){
                    for(var a = 0; a<respond["content"].length; a++){
                        html+="<option value = '"+respond['content'][a]["name"]+"'></option>";
                    }
                    $("#daftar_user").html(html);
                }
            }
        });
    }
</script>