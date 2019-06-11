
<form action="" method="post">
<div class="col-lg-10" style="height: 250px; overflow-y: auto;">
    <table class="dienynas" >
        <thead><tr>
            <td style="width: 150px;">Vartojo vardas</td>
            <td style="width: 150px;">Vardas</td>
            <td style="width: 150px;">Pavardė</td>
            <td style="width: 200px;">Elektroninis paštas</td>
            <td style="width: 200px;">Mokykla</td>
            <td style="width: 200px;">Statusas</td>
        </tr></thead>
        <tbody id="marks_content">
        <?php foreach($users as $user): ?>
        <tr class="mark-holder" style="cursor: pointer;" name="moreInfo" onclick="moreInfo(<?=$user->id?>);">
            <td><?=$user->username?></td>
            <td><?=$user->firstname?></td>
            <td><?=$user->lastname?></td>
            <td><?=$user->email?></td>
            <td><?=$user->school?></td>
            <td><?=$user->role?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div id="moreInfo-response">
    
</div>
</form>

