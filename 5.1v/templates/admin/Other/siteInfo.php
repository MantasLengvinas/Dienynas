<style>
    .menu_holder{
        display: inline-flex;
    }
    .menu_holder > li{
        margin: 0 15px 0 15px;
    }
    .menu_holder > li > ul{
        display: inline-block;
        margin: 3px 0 0 10px;
    }
    .menu_holder > li > p{
        width: max-content;
    }
    .menu_holder > li > ul > li{
        list-style: disc;
        width: max-content;
    }
    .menu_holder > li > ol > li{
        list-style: decimal;
        width: max-content;
    }
</style>

<div class="row">
    <div class="col-md-10">
        <div id="siteInfo_menu">
            <ul class="menu_holder">
                <li style="display: block;">
                    <p>Mokslo metai</p>
                    <ul id="study_year">
                        <li><b><?=sy?></b></li>
                    </ul>
                </li>
                <li style="display: block;">
                    <p>Pusmečių informacija</p>
                    <ol id="period-desc">
                        <?php foreach(period_desc as $period): ?>
                            <li><b><?=$period?></b></li>
                        <?php endforeach;?>
                    </ol>
                </li>
                <li style="display: block;">
                    <p>Versija</p>
                    <ul id="other">
                        <li><b><?=version?></b></li>
                    </ul>
                </li>
                <li style="display: block;">
                    <p class="color_kontr">API raktas</p>
                    <ul id="api_key">
                        <li style="cursor: pointer;"><b class="color_kontr"><?=api_key?></b></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>