<div id="body_section" class="row row-table" style="position:relative">

    <div class="col-md-3 full_height_col" style="padding-right:0;padding-left:0;">
        <div id="sidebar">
            <div id="s_menu">
                <style>
                    .menu_badge {
                        font-size: 8px;
                        padding: 0px 3px;
                        line-height: 12px;
                        right: 4px;
                        top: 4px;
                        text-transform: uppercase;
                        position: absolute;
                        display: inline-block;
                        border-radius: 3px;
                        -moz-border-radius: 3px;
                        webkit-border-radius: 3px;
                    }
                </style>

                <ul id="menu-selects">

                    <li data-name="naujienos">
                        <div style="position:relative" class="s_menu_title icon_news">
                            <span class="menu_icon" style="background: url('../static/images/news.png')"></span>

                            <span><a href="../Klaida/Klaida">Naujienos</a></span>
                        </div>
                    </li>

                    <li data-name="pagrindinis.admin" class="hidden">
                        <div style="position:relative" class="s_menu_title icon_news">
                            <i class="fa fa-cogs fa-2x fa-fw" aria-hidden="true" style="font-size:21px;color:white; display: inline-block;vertical-align: middle;margin: -2px 10px 0 10px;"></i>

                            <span><a href="../Klaida/Klaida">Pagrindinis</a></span>
                        </div>
                        <ol id="selects">
                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida" onclick="users();">Vartotojai</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida" onclick="marks();">Pažymiai</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida" onclick="subjects();">Dalykai</a>
                            </li>
                        </ol>


                    </li>

                    <li data-name="more.admin" class="hidden">
                        <div style="position:relative" class="s_menu_title icon_info">
                            <span class="menu_icon" style="background: url('../static/images/more.png')"></span>

                            <span>Kita</span>
                        </div>
                        <ol id="selects">

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida" onclick="sessions();">Prisijungimai</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida" onclick="logs();">Žurnalas</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida" onclick="siteInfo();">Informacija</a>
                            </li>

                        </ol>
                    </li>

                    <a href="../Klaida/Klaida">
                        <li data-name="kalba.lt.mok">
                            <div class="s_menu_title" style="background-color:#5e4534;">
                                <span class="menu_icon" style="background:none; margin:-2px 10px 0 10px;"><img
                                        src="../static/images/kalba_logo.png" style="height:28px;"></span>
                                <span>KALBA.lt paslaugos</span>
                            </div>
                        </li>
                    </a>





                    <li data-name="analitika_demo.mok">
                        <div style="position:relative" class="s_menu_title ">
                            <i class="fa fa-pie-chart"
                                style="font-size:21px;color:white; display: inline-block;vertical-align: middle;margin: -2px 10px 0 10px;"></i>

                            <span>Analitika</span>
                        </div>
                        <ol>


                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Apžvalga</a>
                            </li>





                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Pagal dalykus</a>
                            </li>



                        </ol>
                    </li>





                    <li data-name="tamo.ismaniems.mok">
                        <div class="s_menu_title icon_mobile" style="background-color:#e14d4e">
                            <span class="menu_icon" style="background: url('../static/images/phone.png')"></span>
                            <span>TAMO išmaniems</span>
                        </div>
                        <ol>


                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Paslaugų valdymas</a>
                            </li>



                        </ol>
                    </li>




                    <li data-name="mano.dienynas.mok">
                        <div style="position:relative" class="s_menu_title icon_journal">
                            <span class="menu_icon" style="background: url('../static/images/diary.png')"></span>

                            <span>Mano dienynas</span>
                        </div>
                        <ol id="selects">


                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Tvarkaraštis</a>
                            </li>

                            <li style="position:relative" class="">
                                <a id="men" href="../Pamoka/MokinioDienynas">Dienynas</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Pamokos</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Namų darbai</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Atsiskaitomieji darbai</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Pagyrimai/ Pastabos</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Trimestrai / Pusmečiai</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Vidurkių skaičiavimas</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Mano knygos</a>
                            </li>

                        </ol>
                    </li>




                    <li data-name="ipazanga.mok">
                        <div style="position:relative" class="s_menu_title ">
                            <span class="menu_icon"></span>

                            <span>Individuali pažanga</span>
                        </div>
                        <ol>


                            <li style="position:relative" class="">
                                <a href="#">Įsivertinimai</a>
                            </li>
                        </ol>
                    </li>




                    <li data-name="papildoma.informacija.mok">
                        <div style="position:relative" class="s_menu_title icon_note">
                            <span class="menu_icon" style="background: url('../static/images/other.png')"></span>

                            <span>Papild. informacija</span>
                        </div>
                        <ol>


                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Dokumentų saugykla</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Nauji ugdymo planai</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Ugdymo planas</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida"></a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida"></a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida"></a>
                            </li>
                        </ol>
                    </li>

                    <li data-name="kita">
                        <div style="position:relative" class="s_menu_title icon_info">
                            <span class="menu_icon" style="background: url('../static/images/more.png')"></span>

                            <span>Kita</span>
                        </div>
                        <ol>


                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Pranešimai (0)</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Apklausos (0)</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Forumai</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Asmeniniai duomenys</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Klasių gimtadieniai</a>
                            </li>

                            <li style="position:relative" class="">
                                <a href="../Klaida/Klaida">Atostogų datos</a>
                            </li>
                        </ol>
                    </li>
                </ul>

                <div id="sidebar_spacer"></div>
            </div>
        </div>
    </div>
    <div class="col-md-11 full_height_col" style="padding-bottom:20px;">
        <div class="global_search_container">
            <form id="c_search_form" action="">
                <input id="search_input" name="search_input" type="text" value="Ieškokite vardo arba pavardės"
                    class="ui-autocomplete-input" autocomplete="off">
            </form>
        </div>

        <!-- <script>
    var date = new Date();
    var thisMonth = date.getMonth() + 1;
    let monthName = [0, 'sausis', 'vasaris', 'kovas', 'balandis', 'geguze', 'birzelis', 'liepa', 'rugpjutis', 'rugsejis', 'spalis', 'lapkritis', 'gruodis'];
    let a = document.getElementById('men');
    let link = ("../men/" + monthName[thisMonth] + ".php").toString();
    console.log(link);
    a.href = link;
</script> -->