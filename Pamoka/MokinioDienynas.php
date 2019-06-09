<?php 
    include_once "../partials/header.php";
    include_once "../partials/menu.php";
?>

<div id="c_main">
            
            <div class="page_header">
                <div class="row">
                    <div class="col-md-10"><h3>Mokinio dienynas</h3></div>
                </div>
            </div>        
            
            <div class="page_content">
                <div class="row">
                    <div class="col-md-14">
                        <div style="margin:20px 0" class="date_selector">
                                <div id="1" class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a style="text-decoration:none;" data-menuo="9" data-metai="2018" href="javascript:void(0);" onclick="loadTable(this);">2018-09</a></div>
                                <div id="2" class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a style="text-decoration:none;" data-menuo="10" data-metai="2018" href="javascript:void(0);" onclick="loadTable(this);">2018-10</a></div>
                                <div id="3" class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a style="text-decoration:none;" data-menuo="11" data-metai="2018" href="javascript:void(0);" onclick="loadTable(this);">2018-11</a></div>
                                <div id="4" class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a style="text-decoration:none;" data-menuo="12" data-metai="2018" href="javascript:void(0);" onclick="loadTable(this);">2018-12</a></div>
                                <div id="5" class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a style="text-decoration:none;" data-menuo="1" data-metai="2019" href="javascript:void(0);" onclick="loadTable(this);">2019-01</a></div>
                                <div id="6" class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a style="text-decoration:none;" data-menuo="2" data-metai="2019" href="javascript:void(0);" onclick="loadTable(this);">2019-02</a></div>
                                <div id="7" class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a style="text-decoration:none;" data-menuo="3" data-metai="2019" href="javascript:void(0);" onclick="loadTable(this);">2019-03</a></div>
                                <div id="8" class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a style="text-decoration:none;" data-menuo="4" data-metai="2019" href="javascript:void(0);" onclick="loadTable(this);">2019-04</a></div>
                                <div id="9" class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a style="text-decoration:none;" data-menuo="5" data-metai="2019" href="javascript:void(0);" onclick="loadTable(this);">2019-05</a></div>
                                <div id="10" class="hidden" style="display:inline-block;padding:5px;font-weight:bold;"><a style="text-decoration:none;" data-menuo="6" data-metai="2019" href="javascript:void(0);" onclick="loadTable(this);">2019-06</a></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-14" style="position:relative;text-align:center" id="timetable_content" data-tb-width="765px">

            </div>
                    </div>
                </div>
            
            <div style="height:10px;"></div>
                <div class="row">
                <div class="col-md-14" id="data"><h4>Pažymių spalvos</h4></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <ul>
                        <li><span class="fa fa-circle color_praktinis" style="vertical-align:middle;"></span> - praktinis darbas; </li>
                        <li><span class="fa fa-circle color_kontr" style="vertical-align:middle;"></span> - kontrolinis darbas; </li>
                        <li><span class="fa fa-circle color_paprastas" style="vertical-align:middle;"></span> - paprastas darbas; </li>
                        <li><span class="fa fa-circle color_sav" style="vertical-align:middle;"></span> - savarankiškas darbas; </li>
                        <li><span class="fa fa-circle color_namu" style="vertical-align:middle;"></span> - namų darbas; </li>
                    </ul>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <ul>
                        <li><span class="fa fa-circle color_klases" style="vertical-align:middle;"></span> - klasės darbas; </li>
                        <li><span class="fa fa-circle color_teorinis" style="vertical-align:middle;"></span> - teorinis darbas; </li>
                        <li><span class="fa fa-circle color_iskaita" style="vertical-align:middle;"></span> - įskaita; </li>
                        <li><span class="fa fa-circle color_testas" style="vertical-align:middle;"></span> - testas; </li>
                        <li><span class="fa fa-circle color_kaupiamasis" style="vertical-align:middle;"></span> - kaupiamasis; </li>
                    </ul>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <ul>
                        <li><span class="fa fa-circle color_kitu_ist" style="vertical-align:middle;"></span> - iš kitų įstaigų; </li>
                        <li><span class="fa fa-circle color_projektas" style="vertical-align:middle;"></span> - projektas; </li>
                        <li><span class="fa fa-circle color_rasinys" style="vertical-align:middle;"></span> - rašinys. </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-14"><h4>Kiti žymėjimai</h4></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li>
                            <div style="display:inline-block;width:24px;height:31px;vertical-align:middle;" class="recent-mark"></div><span"> - įvertinimas įvestas per paskutines 5 dienas.
                        </span></li>
                    </ul>
                   
                </div>
            </div>
            
            
            
                <div class="row">
                <div class="col-md-14"><h4>Lankomumo žymėjimai</h4></div>
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

<?php 
    include_once "../partials/footer.php";
?>

<script>
        var date = new Date();
        let metai = date.getFullYear();
        let menuo = date.getMonth() + 1;
        $('.date_selector div').children('a').each(function () {
            if($(this).data('menuo') <= menuo || $(this).data('metai') < metai){
                $(this).parent().removeClass('hidden');
            }
        });
</script>

<script src="../scripts/writeMarks.js"></script>

<script>

    let loadTable = (id) =>{
        document.getElementById('loader').classList.remove('hidden');
        $('html').css('opacity', '0.6');
        $('.date_selector div').removeClass('date_active');
        $(id).parent().addClass('date_active');
        let metai = $(id).data('metai');
        let menuo = $(id).data('menuo');
        let data = {metai: metai, menuo: menuo};
        let url = '../API/DienynasTable';

        $.ajax({
            type: 'POST',
            url: url,
            data: data
        })
        .done(function(data){
            $('#timetable_content').html(data);
            loadMarks(id);
            scrollTimeTable(metai, menuo);
        });
    }

    let loadMarks = (id) =>{
        let metai = $(id).data('metai');
        let menuo = $(id).data('menuo');
        let data = {metai: metai, menuo: menuo};
        let url = '../API/DienynasMarks';
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'JSON'
        })
        .done(function(data){
            writeMarks(data); 
            document.getElementById('loader').classList.add('hidden');
            $('html').css('opacity', '1');
        });
    }
</script>


<script>
    $(document).ready(function(){
        var date = new Date();
        let metai = date.getFullYear();
        let menuo = date.getMonth() + 1;
        let data = {metai: metai, menuo: menuo};
        let url = '../API/DienynasTable';
        let link = $('.date_selector div').find("[data-menuo='"+menuo+"']");
        $(link).parent().addClass('date_active');

        $.ajax({
            type: 'POST',
            url: url,
            data: data
        })
        .done(function(data){
            $('#timetable_content').html(data);
            loadMarks(link);
            scrollTimeTable(metai, menuo);
        })
    });


    let scrollTimeTable = (metai, menuo) => {
        var date = new Date();
        let thisMonth = date.getMonth() + 1;
        let thisYear = date.getFullYear();
            var today_year = thisYear;
            var today_month =  thisMonth;
            var today_day = date.getDate();
            if(metai == today_year && menuo==today_month){
                $("#scrollable_dienynas").scrollLeft(28*(today_day - 16));
            }
    }
</script>