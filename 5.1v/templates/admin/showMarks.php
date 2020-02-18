<style>
    .selected_mark:hover {
        background-color: rgba(200, 10, 10, 0.2);
        cursor: pointer;

    }

}
</style>

<table class="dienynas">
    <thead>
        <tr>
            <td style="width: 121px;">Dalykas</td>
            <td style="width: 60px;">Metai</td>
            <td style="width: 60px;">Mėnuo</td>
            <td style="width: 60px;">Diena</td>
            <td style="width: 60px;">Pažymys</td>
            <td style="width: 50px;">Tipas</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($marks as $mark): ?>
        <tr onclick="deleteMark(<?=$mark->id?>);" class="selected_mark">
            <td><?=$mark->subject?></td>
            <td><?=$mark->year?></td>
            <td><?=$mark->month?></td>
            <td><?=$mark->day?></td>
            <td><?=$mark->mark?></td>
            <td><?php echo '<div style="padding:0;margin:0;vertical-align:middle"><span class="fa fa-circle '.$mark->type.'" style="vertical-align:middle;font-weight:bold;font-size:10px;padding-left:2px;margin-top:-2px"></span></div>';?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>