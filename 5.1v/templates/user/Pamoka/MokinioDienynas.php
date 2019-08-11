<?php 
    include_once '../../../inc/header.php';
    include_once '../../../inc/menu.php';
?>

<!-- Body section -->
<div id="c_main">

    <div class="page_header">
        <div class="row">
            <div class="col-md-10">
                <h3><?=$title?></h3>
            </div>
            <div class="col-md-4 text-right"><a title="Didinti / mažinti" id="resize_button"
                    class="c_btn utility no-text" onclick="toggle_fullscreen()"><i class="fa fa-expand"
                        style="font-size: 15px;"></i><span class="hidden">Didinti</span></a></div>
        </div>
    </div>

    <div class="page_content">
        <div class="row">
            <div class="col-md-14">
                <div style="margin:20px 0" class="date_selector">
                    <div class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a
                            style="text-decoration:none;" data-menuo="9" data-metai="2019" href="javascript:void(0);"
                            onclick="loadTable(this);">2019-09</a></div>
                    <div class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a
                            style="text-decoration:none;" data-menuo="10" data-metai="2019" href="javascript:void(0);"
                            onclick="loadTable(this);">2019-10</a></div>
                    <div class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a
                            style="text-decoration:none;" data-menuo="11" data-metai="2019" href="javascript:void(0);"
                            onclick="loadTable(this);">2019-11</a></div>
                    <div class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a
                            style="text-decoration:none;" data-menuo="12" data-metai="2019" href="javascript:void(0);"
                            onclick="loadTable(this);">2019-12</a></div>
                    <div class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a
                            style="text-decoration:none;" data-menuo="1" data-metai="2020" href="javascript:void(0);"
                            onclick="loadTable(this);">2020-01</a></div>
                    <div class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a
                            style="text-decoration:none;" data-menuo="2" data-metai="2020" href="javascript:void(0);"
                            onclick="loadTable(this);">2020-02</a></div>
                    <div class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a
                            style="text-decoration:none;" data-menuo="3" data-metai="2020" href="javascript:void(0);"
                            onclick="loadTable(this);">2020-03</a></div>
                    <div class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a
                            style="text-decoration:none;" data-menuo="4" data-metai="2020" href="javascript:void(0);"
                            onclick="loadTable(this);">2020-04</a></div>
                    <div class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a
                            style="text-decoration:none;" data-menuo="5" data-metai="2020" href="javascript:void(0);"
                            onclick="loadTable(this);">2020-05</a></div>
                    <div class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a
                            style="text-decoration:none;" data-menuo="6" data-metai="2020" href="javascript:void(0);"
                            onclick="loadTable(this);">2020-06</a></div>
                    <div class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a
                            style="text-decoration:none;" data-menuo="7" data-metai="2020" href="javascript:void(0);"
                            onclick="loadTable(this);">2020-07</a></div>
                    <div class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a
                            style="text-decoration:none;" data-menuo="8" data-metai="2020" href="javascript:void(0);"
                            onclick="loadTable(this);">2020-08</a></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-14" style="position:relative;text-align:center" id="timetable_content"
                data-tb-width="765px">

            </div>
        </div>
    </div>

    <div style="height:10px;"></div>
    <div class="row">
        <div class="col-md-14" id="data">
            <h4>Pažymių spalvos</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <ul>
                <li><span class="fa fa-circle color_praktinis" style="vertical-align:middle;"></span> - praktinis
                    darbas; </li>
                <li><span class="fa fa-circle color_kontr" style="vertical-align:middle;"></span> - kontrolinis darbas;
                </li>
                <li><span class="fa fa-circle color_paprastas" style="vertical-align:middle;"></span> - paprastas
                    darbas; </li>
                <li><span class="fa fa-circle color_sav" style="vertical-align:middle;"></span> - savarankiškas darbas;
                </li>
                <li><span class="fa fa-circle color_namu" style="vertical-align:middle;"></span> - namų darbas; </li>
            </ul>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <ul>
                <li><span class="fa fa-circle color_klases" style="vertical-align:middle;"></span> - klasės darbas;
                </li>
                <li><span class="fa fa-circle color_teorinis" style="vertical-align:middle;"></span> - teorinis darbas;
                </li>
                <li><span class="fa fa-circle color_iskaita" style="vertical-align:middle;"></span> - įskaita; </li>
                <li><span class="fa fa-circle color_testas" style="vertical-align:middle;"></span> - testas; </li>
                <li><span class="fa fa-circle color_kaupiamasis" style="vertical-align:middle;"></span> - kaupiamasis;
                </li>
            </ul>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <ul>
                <li><span class="fa fa-circle color_kitu_ist" style="vertical-align:middle;"></span> - iš kitų įstaigų;
                </li>
                <li><span class="fa fa-circle color_projektas" style="vertical-align:middle;"></span> - projektas; </li>
                <li><span class="fa fa-circle color_rasinys" style="vertical-align:middle;"></span> - rašinys. </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-14">
            <h4>Kiti žymėjimai</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul>
                <li>
                    <div style="display:inline-block;width:24px;height:31px;vertical-align:middle;" class="recent-mark">
                    </div>
                    <span> - įvertinimas įvestas per paskutines 5 dienas.
                        </span>
                </li>
            </ul>

        </div>
    </div>



    <div class="row">
        <div class="col-md-14">
            <h4>Lankomumo žymėjimai</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <ul>
                <li><b>n</b> - nebuvo pamokoje, nepateisinta; </li>
                <li><b>nt</b> - nebuvo pamokoje, pateisinta tėvų (dėl ligos); </li>
                <li><b>nv</b> - nebuvo pamokoje, pateisinta (varžybos, olimpiados, konkursai); </li>
                <li><b>np</b> - nebuvo pamokoje, pateisinta (kita priežastis); </li>
            </ul>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <ul>
                <li><b>nl</b> - nebuvo pamokoje, pateisinta (dėl ligos); </li>
                <li><b>nk</b> - nebuvo pamokoje, pateisinta tėvų (ne dėl ligos); </li>
                <li><b>ns</b> - nebuvo pamokoje, pateisinta (direktoriaus įsakymu); </li>
                <li><b>ng</b> - nebuvo pamokoje, pateisinta (gydytojo pažyma); </li>
            </ul>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <ul>
                <li><b>p</b>- pavėlavo į pamokas; </li>
                <li><b>*</b> - vertinimas tekstu; </li>
            </ul>
        </div>
    </div>

</div>

</div>
</div>
</div>

<script>

    $(document).ready(function () {
        dateSelector();
        var date = new Date();
        let metai = date.getFullYear();
        let menuo = date.getMonth() + 1;
        let data = {
            metai: metai,
            menuo: menuo,
            info: monthInfo
        };
        let url = '../Pamoka/DienynasTable';
        let link = $('.date_selector div').find("[data-menuo='" + menuo + "']");
        $(link).parent().addClass('date_active');

        $.ajax({
                type: 'POST',
                url: url,
                data: data
        })
        .done(function (data) {
            $('#timetable_content').html(data);
            scrollTimeTable(metai, menuo);
        })
    });

    function toggle_fullscreen() {
        if ($("#body_section > .col-md-14").length > 0) {
            $("#body_section > .col-md-14").removeClass("col-md-14").addClass("col-md-11");
            $("#scrollable_dienynas").css("width", "765px");
            $("#timetable_content").data("tb-width", "765px");
            $("#resize_button span").text("Didinti");
            $("#resize_button i").removeClass("fa-compress-alt").addClass("fa-expand-alt");
        } else {
            $("#body_section > .col-md-11").removeClass("col-md-11").addClass("col-md-14");
            $("#scrollable_dienynas").css("width", "980px");
            $("#timetable_content").data("tb-width", "980px");
            $("#resize_button span").text("Mažinti");
            $("#resize_button i").removeClass("fa-expand-alt").addClass("fa-compress-alt");
        }
        $("#body_section > .col-md-3").toggleClass("hidden");
    }
</script>

<?php include_once '../../../inc/footer.php'; ?>