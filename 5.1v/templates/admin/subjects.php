<?php 
    include_once 'inc/header.php';
    include_once 'inc/menu.php';
?>

<!-- Body section -->


<div id="c_main">

    <div class="page_header">
        <h3 id="admin_page_header">Mokomieji dalykai</h3>
        <div class="header_description" id="header_description">

        </div>
    </div>

    <div class="page_content">

        <div class="row">
            <div class="col-md-14 d-flex" style="position:relative;" id="admin_content">
<div class="row">
    <div class="col-md-6 d-flex flex-column">
        <div class="d-flex flex-column">

            <label>Mokinys</label>
            <div class="p-2">

                <select class="p-2" name="student" id="student">
                    <?php 
                        foreach($students as $student){
                            echo '<option value="'.$student->username.'">'.$student->firstname.' '.$student->lastname.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div style="margin: 10px 0 20px 0;">
            <div style="height: 15px;">
                <label style="float: left;"><b>Įrašyti mokomąjį dalyką</b></label>
            </div>
        </div>

            <label>Mokomasis dalykas</label>
            <div class="p-2">
                <input id="subject" type="text" name="subject" placeholder="Dalyko pavadinimas">
            </div>
            <label>Dalyko mokytojas</label>
            <div class="p-2">
                <input id="teacher" type="text" name="teacher" placeholder="Mokytojo pavardė, vardas">
            </div>

            <button class="p-2 c_btn submit " name="submit" onclick="uploadSubject();"><a
                    style="color: #fff;">Įrašyti</a></button>
        </div>

        <b>
            <div id="uploadsubject-response" style="margin: 10px 0 0 0;">

            </div>
        </b>
        </div>
        </div>
    </div>
</div>

<?php include_once 'inc/footer.php';?>