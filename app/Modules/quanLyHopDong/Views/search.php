<section class="content">
    <div class="container-fluid" style="margin-top: 2%;">
        <h2 class="text-center display-5" style="margin: 10px">Tìm Kiếm</h2>
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-2" style="margin-left: 1%;padding: 1% 1% 0px 0px">
                <div class="form-group">
                    <label>Phòng ban</label>
                    <select class="select2 select2-hidden-accessible form-control search_phong_ban"
                            id="search_phong_ban"
                            name="search_phong_ban" style="width: 100%;"
                            data-select2-id="3" tabindex="-1" aria-hidden="true">
                        <option value="">---Chọn---</option>
                        <option value="1">Ban giám đốc</option>
                        <option value="2">Phòng kế hoạch quản trị</option>
                        <option value="3">Phòng Phát triển phần mềm 1</option>
                        <option value="4">Phòng Phát triển phần mềm 2</option>
                        <option value="5">Phòng nghiên cứu tư vấn</option>
                        <option value="6">Phòng vận hành</option>
                    </select>
                </div>
            </div>
            <div class="col-1" style="margin-left: 2%;padding: 1% 1% 0px 0px">
                <div class="form-group">
                    <label>Trạng Thái :</label>
                    <select class="select2 select2-hidden-accessible form-control" name="search_trang_thai"
                            id="search_trang_thai" name="search_trang_thai"
                            style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
                        <option value="">---Chọn---</option>
                        <option value="1">Đã Hoàn Thành</option>
                        <option value="2">Đang Thực Hiện</option>
                        <option value="3">Tạm Dừng</option>
                    </select>
                </div>
            </div>
            <div class="col-3" style="margin-left: 2%;display: flex; border: 1px dashed black;padding: 1% 1% 0px 0px; position:relative" >
                <b>
                    <p style="position:absolute; top:-13px;left: 2%; background-color: white ">Thời gian thực hiện </p>
                </b>

                <div class="col-6" style="margin-right: 10px">
                    <div class="form-group">
                        <label>Từ ngày</label>
                        <div class="contentDate">
                            <div class="input-group-prepend inputDate">
                                <input type="text" name="tu_ngay_thuc_hien" id="tu_ngay_thuc_hien" class="form-control" autocomplete="off" placeholder="dd/mm/yy">

                                <span type="button" style="left: -20px" class="input-group-text" id="datepicker-trigger2">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Đến ngày</label>
                        <div class="contentDate">
                            <div class="input-group-prepend inputDate">
                                <input type="text" name="den_ngay_thuc_hien" id="den_ngay_thuc_hien" class="form-control" autocomplete="off" placeholder="dd/mm/yy">

                                <span type="button" style="left: -20px" class="input-group-text" id="datepicker-trigger2">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3" style="margin-left: 2%;display: flex; border: 1px dashed black;padding: 1% 1% 0px 0px; position:relative" >
                <b>
                    <p style="position:absolute; top:-13px;left: 2%; background-color: white ">Thời gian kết thúc </p>

                </b>

                <div class="col-6" style="margin-right: 10px">
                    <div class="form-group">
                        <label>Từ ngày</label>
                        <div class="contentDate">
                            <div class="input-group-prepend inputDate">
                                <input type="text" name="tu_ngay_ket_thuc" id="tu_ngay_ket_thuc" class="form-control" autocomplete="off" placeholder="dd/mm/yy">
                                <span type="button" style="left: -20px" class="input-group-text" id="datepicker-trigger2">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Đến ngày</label>
                        <div class="contentDate">
                            <div class="input-group-prepend inputDate">
                                <input type="text" name="den_ngay_ket_thuc" id="den_ngay_ket_thuc" class="form-control" autocomplete="off" placeholder="dd/mm/yy">

                                <span type="button" style="left: -20px" class="input-group-text" id="datepicker-trigger2">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-10 offset-md-1" style="margin-top: 10px">
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input name="enter_search" id="enter_search" type="search"
                               class="form-control form-control-lg enter_search"
                               placeholder="Nhập số hợp đồng hoặc tên hợp đồng">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    <?php require_once("Modules/quanLyHopDong/Public/js/datePicker.js")?>
</script>