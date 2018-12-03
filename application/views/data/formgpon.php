<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>ADD DATA GPON<small>tambah data</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form data-parsley-validate
                  class="form-horizontal form-label-left"
                  method="post"
                  action="<?php isset($data->id) ? route("data/save", $data->id ): route("data/save"); ?>"
            >

<!--                <div class="form-group">-->
<!--                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Vendor-->
<!--                    </label>-->
<!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                        <input disabled value="--><?php //echo $vendor->nama?><!--" type="text" required class="form-control col-md-7 col-xs-12">-->
<!--                        <input name="vendor_id" type="hidden" value="--><?php //echo $vendor->id; ?><!--">-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal create
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input value="<?php show_ifset($data->tanggal, date('d-m-Y'), true); ?>" type="text" name="tanggal" required class="datepicker form-control col-md-7 col-xs-12">
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">soal</label>-->
<!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                        <textarea value="" class="form-control" rows="5" name="soal" required>--><?php //show_ifset($data->soal);?><!--</textarea>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">IPGPON</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->ipgpon);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="ipgpon" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Slot</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->slot);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="slot" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Port</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->port);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="port" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">STO</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="heard" class="form-control" required="" name="sto">
                            <option value=""><?php show_ifsetoption($data->sto)?></option>
                            <option value="mtr" name="mtr">MTR</option>
                            <option value="swe" name="swe">SWE</option>
                            <option value="ger" name="ger">GER</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">ODC</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->odc);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="odc" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">List ODP</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->listodp);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="listodp" required>
                    </div>
                </div>

<!--                <div class="form-group">-->
<!--                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">kategori</label>-->
<!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                        <select class="custom-select d-block w-100" id="state" required="">-->
<!--                            <option name="tkp">TKP</option>-->
<!--                            <option name="twk">TWK</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="form-group">-->
<!--                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No Telp. Pelanggan</label>-->
<!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                        <input value="--><?php //show_ifset($data->pelanggan_telepon); ?><!--"-->
<!--                               class="form-control col-md-7 col-xs-12"-->
<!--                               type="text" name="pelanggan_telepon">-->
<!--                    </div>-->
<!--                </div>-->



                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Pelaksana <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="pelaksana" type="text" value="<?php show_ifset($data->pelaksana, $this->auth->get_name()); ?>" class="date-picker form-control col-md-7 col-xs-12" required>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="button" class="btn btn-primary" onclick="location.reload()">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>