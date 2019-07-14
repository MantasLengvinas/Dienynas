
<div class="row">

    <div class="col-lg-5">
        <input type="text" placeholder="Ieškoti" name="user_search" onchange="searchUser(this.value);">
        <a href="javascript:void(0)" class="btn c_btn" onclick="users();">Visi vartotojai</a>
    </div>

    <div class="col-lg-10" style="height: auto; max-height: 250px; overflow-y: auto;">
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
                <tr class="mark-holder <?php if($_SESSION['username'] === $user->username): ?>current-user<?php endif;?>" style="cursor: pointer;" name="moreInfo" onclick="moreInfo(<?=$user->id?>);">
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
</div>
<div class="row">
                    <div class="col-md-6 d-flex flex-column">
                    <div style="margin: 10px 0 10px 0;">
       <div style="height: 15px;">
          <label style="float: left;"><b>Sukurti naują vartotoją</b></label>
       </div>     
    </div>
        <div class="d-flex flex-column">
            <div class="p-2">
                <input id="username" type="text" name="username" placeholder="Vartotojo vardas">
            </div>
            <div class="p-2">
                <input id="firstname" type="text" name="firstname" placeholder="Vardas">
            </div>
            <div class="p-2">
                <input id="lastname" type="text" name="lastname" placeholder="Pavardė">
            </div>
            <div class="p-2">
                <input id="email" type="email" name="email" placeholder="Elektroninis paštas">
            </div>
            <div class="p-2">     
                <input id="password" type="password" name="password" placeholder="Slaptažodis">
            </div>
            <div class="p-2">     
                <input id="school" type="text" name="school" placeholder="Mokykla">
            </div>
            <div class="p-2">     
                <input id="role" type="text" name="role" placeholder="Statusas">
            </div>
            
            <button class="p-2 c_btn submit " name="submit" onclick="createUser();"><a style="color: #fff;">Įrašyti</a></button>
        </div>
        <label id="user-response" style="margin: 20px 0;"></label>
    </div>
<div id="moreInfo-response">
    
</div>

