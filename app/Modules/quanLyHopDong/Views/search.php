<section class="content" style="margin-bottom: 0">
    <div class="container-fluid">
        <h2 class="text-center display-5">TÌM KIẾM</h2>
        <form action="list" data-select2-id="10">
            <div class="row">
                <div class="col-1">
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Phòng Ban:</label>
                        <select class="select2 select2-hidden-accessible form-control" name="search_phong_ban" style="width: 100%;"
                                data-select2-id="3" tabindex="-1" aria-hidden="true">
                            <option value="0">---Chọn---</option>
                            <option value="1">Ban Giám đốc</option>
                            <option value="2">Phòng Kế Hoạch Quản Trị</option>
                            <option value="3">Phòng PTPM 1</option>
                            <option value="4">Phòng PTPM 2</option>
                            <option value="5">Phòng Nghiên Cứu Tư Vấn</option>
                            <option value="6">Phòng Vận Hành</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Thời Gian Thực Hiện</label>
                        <div class="contentDate">
                            <div class="input-group-prepend inputDate">
                                <input type="text" name="thoi_gian_thuc_hien" id="thoi_gian_thuc_hien" class="form-control"
                                       autocomplete="off" placeholder="dd/mm/yyyy">
                                <span type="button" style="left: -20px" class="input-group-text datepicker-trigger1"
                                      id="datepicker-trigger1"><i class="far fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Thời Gian Kết Thúc</label>
                        <div class="contentDate">
                            <div class="input-group-prepend inputDate">
                                <input type="text" name="thoi_gian_ket_thuc" id="thoi_gian_ket_thuc" class="form-control"
                                       autocomplete="off" placeholder="dd/mm/yyyy">
                                <span type="button" style="left: -20px" class="input-group-text"
                                      id="datepicker-trigger2"><i class="far fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <label>Option</label>
                        <select class="select2 select2-hidden-accessible form-control" name="option" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
                            <option value="0">---Chọn---</option>
                            <option value="ngay_ky" >Ngày ký</option>
                            <option value="thoi_gian_thuc_hien" >Thời gian thực hiện</option>
                            <option value="ngay_ket_thuc" >Ngày kết thúc</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Trạng Thái :</label>
                        <select class="select2 select2-hidden-accessible form-control" name="search_trang_thai"
                                style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
                            <option value="0">---Chọn---</option>
                            <option value="1">Đã Hoàn Thành</option>
                            <option value="2">Đang Thực Hiện</option>
                            <option value="3">Tạm Dừng</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1">
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input name="search" type="search" class="form-control form-control-lg"
                                   placeholder="Nhập số hợp đồng hoặc tên hợp đồng">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<script src="../../../Public/plugins/jquery/jquery.min.js"></script>
<script src="../../../Public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../Public/plugins/select2/js/select2.full.min.js"></script>
<script src="../../../Public/dist/js/adminlte.min.js?v=3.2.0"></script>
<script src="../../../Public/dist/js/demo.js"></script>
<script>
    <?php include "Modules/quanLyHopDong/Public/js/datePicker.js"?>
</script>
<script>
    $(function () {
        $('.select2').select2()
    })
</script>