<?php 
    include_once "../partials/header.php";
    include_once "../partials/menu.php";
?>

<?php  //DB config

include "../config/db.php";

if (!function_exists('getLink')) { 
    function getLink($serverName,$userName,$userPassword,$nameOfDataBase){
        $link=@mysqli_connect($serverName,$userName,$userPassword,$nameOfDataBase);
        if(!$link){
            echo "connection Error".mysqli_connect_errno();
        }
        return $link;
    }
}
$subjects = [];

$link = getLink($host, $user, $pass, $db);
$query = "SELECT subject FROM stdata";
$result = mysqli_query($link, $query);
$num_rows = mysqli_num_rows($result);
$i = 0; 

if(mysqli_num_rows($result) != 0) {                  
    while($data=mysqli_fetch_assoc($result)){ 
        $subject = $data['subject'];
        $subjects[$i] = $subject;
        $i++;
    }
}

$lt = array('Sausis', 'Vasaris', 'Kovas', 'Balandis', 'Gegužė', 'Birželis', 'Liepa', 'Rugpjūtis', 'Rugsėjis', 'Spalis', 'Lapkritis', 'Gruodis');
$types = array('Kontrolinis darbas', 'Savarankiškas darbas', 'Klasės darbas', 'Kaupiamasis', 'Praktinis darbas', 'Namų darbai', 'Įskaita');

?>
    <div id="c_main">

            <div class="page_header">
            
                    <div class="row">
                        <div class="col-md-10"><h3>Pažymiai</h3></div>
                    </div>
            </div>
            <div class="page_content">
                <div class="row">
                        <div class="col-md-14">
                            <div class="selectors" style="margin:20px 0">
                                <div style="display:inline-block;padding:5px;font-weight:bold;" ><a style="text-decoration:none;" href="Mokytojai">Mokytojų informacija</a></div>
                                <div style="display:inline-block;padding:5px;font-weight:bold;" class="date_active"><a style="text-decoration:none;" href="javascript:void(0)">Pažymiai</a></div>
                                <!-- <div style="display:inline-block;padding:5px;font-weight:bold;" ><a style="text-decoration:none;" href="Vidurkiai">Vidurkiai</a></div> -->
                            </div>
                        </div>
                    </div> 
                <div class="row">
                    <div class="col-md-6 d-flex flex-column">
                        <div class="d-flex flex-column">
                                <label>Mėnuo</label>
                            <div class="p-2">
                                
                                <select class="p-2" name="month" id="month">
                                    <?php
                                        $i = 1;  
                                        foreach($lt as $month){
                                            echo '<option value="'.$i.'">'.ucfirst($month).'</option>';
                                            $i++;
                                        }
                                    ?>
                                </select>
                            </div>
                            <label>Diena</label>
                            <div class="p-2">
                                    
                                    <select class="p-2" name="day" id="day">
                                        <?php 
                                            for($i = 1; $i <= 31; $i++){
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        ?>
                                    </select>
                            </div>
                            <label>Dalykas</label>
                            <div class="p-2">
                                   
                                    <select class="p-2" name="subject" id="subject">
        
                                        <?php 
                                        $i = 0; 
                                        foreach($subjects as $subject){
                                            echo '<option value="'.$i.'">'.$subject.'</option>';
                                            $i++;
                                        }
                                        ?>
                                    </select>
                            </div>
                            <label >Pažymys</label>
                            <div class="p-2">
                                
                                <select class="p-2" name="mark" id="mark">
                                    <?php 
                                        for($i = 10; $i >= 0; $i--){
                                            if($i == 0){
                                               echo '<option value="'.$i.'">įsk.</option>';
                                            }
                                            else{
                                               echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <label >Tipas</label>
                            <div class="p-2">
                                    
                                    <select class="p-2" name="type" id="type">
                                        <?php
                                            $i = 0; 
                                            foreach($types as $type){
                                                echo '<option value="'.$i.'">'.$type.'</option>';
                                                $i++;
                                            }
                                        ?>
                                    </select>
                            </div>
                            
                            <button class="p-2 c_btn submit " name="submit" id="uploadButton"><a style="color: #fff;">Įrašyti</a></button>
                        </div>
                        <label id="response" style="margin: 20px 0;"></label>
                    </div>
                    
                    <div id="modal-response"></div>
                    
                    <div>
                            <label>Filtras</label>
                            <select name="filter" id="filter" style="width: 80px;">
                                <option value="filter_none">-</option>
                                <option value="filter_month">Mėnuo</option>
                                <option value="filter_day">Diena</option>
                                <!--<option value="filter_subject">Dalykas</option>-->
                                <option value="filter_mark">Pažymys</option>
                                <!--<option value="filter_type">Tipas</option> -->
                            </select>

                            <input type="text" id="filterInput" placeholder="skaičius" style="width: 80px;">
                            <button class="c_btn submit " id="filterButton"><a style="color: #fff;">Filtruoti</a></button>
                        </div>
                    <div class="col-md-7 float-right" style="height: 350px; overflow-y: scroll;">
                            <table class="dienynas" >
                                <thead><tr>
                                    <td style="width: 80px;">Mėnuo</td>
                                    <td style="width: 60px;">Diena</td>
                                    <td style="width: 60px;">Dalykas</td>
                                    <td style="width: 60px;">Pažymys</td>
                                    <td style="width: 60px;">Tipas</td>
                                    <td style="width: 60px">Keisti</td>
                                    <td style="width: 60px">Trinti</td>
                                </tr></thead>
                                <tbody id="marks_content">

                                </tbody>
                            </table>
                        </div>
                </div> 
                
                </div>
                
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
        
    </div>

    <style>
        select{
            width: 200px;
        }
        .delete-btn{
            font-weight: 600;
            cursor: pointer;
            opacity: .3;
            transition: 0.5s;
            border: none;
            background: #fff;
        }
        .delete-btn:hover{
            opacity: 1;
        }
    </style>
    
    <style>
.modal {
  display: none;
  visibility: hidden;
  position: relative;
  z-index: 1; /* Sit on top */
  position: absolute;
  top:  50%;
  left: 50%;
  transform: translate(-50%,-50%);
  width: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  
}
.modal.show{
   display: block;
   visibility: visible;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}-->
</style>

    <script>
        let uploadMark = () =>{
            let month = $('#month').val();
            let day = $('#day').val();
            let subject = $('#subject').val();
            let mark = $('#mark').val();
            let type = $('#type').val();

            let url = '../API/UploadMark';
            let data = {month: month, day: day, subject: subject, mark: mark, type: type};

            $.ajax({
                type: 'POST',
                url: url,
                data: data
            })
            .done(function(data){
                $('#response').html(data);
                filterMarks();
            });
        }

        let loadMarks = (type, input) =>{
            let url = '../API/MarksTable';
            let data = {type: type, input: input};

            $.ajax({
                type: 'GET',
                url: url,
                data: data
            })
            .done(function(data){
                $('#marks_content').html(data);
            });
        }

        let deleteMark = (id) =>{
            let url = '../API/DeleteMark';
            let data = {id: id};
            
            var con = confirm("Pažymys ("+id+") bus ištrintas");
            
            if(con){
              $.ajax({
                type: 'POST',
                url: url,
                data: data
              })
              .done(function(data){
                $('#response').html(data);
                filterMarks();
              });
            }

        }
        
        let editMark = (id) =>{
           let url = '../API/createModal.php';
           let data = {id: id};
           
           $.post({
              url: url,
              data: data
           })
           .done(function(data){
              $("#modal-response").html(data);
              var modal = document.getElementById('myModal');
              function showModal(){
                 modal.classList.toggle('show');
              }
              var closeBtn = document.getElementById('closeModalBtn');
              closeBtn.onclick = function(){
                showModal();
              }
           })
        }
        
        let updateMark = () =>{
        
           let url = '../API/updateMark.php';
           let id = $("#markid").val();
           let month = $('#cmonth').val();
           let day = $('#cday').val();
           let subject = $('#csubject').val();
           let mark = $('#cmark').val();
           let type = $('#ctype').val();
           
           let data = {id: id, month: month, day: day, subject: subject, mark: mark, type: type};
           
           $.ajax({
                type: 'POST',
                url: url,
                data: data
              })
              .done(function(data){
                $('#response').html(data);
                var modal = document.getElementById('myModal');
                function showModal(){
                   modal.classList.toggle('show');
                }
                showModal();
              });
              filterMarks();
        }

        let filterMarks = () =>{
            let url = '../API/FilterMarks';

            let filter_type = $('#filter').val();
            let filter_input = $('#filterInput').val();

            let data = {filter_type: filter_type, filter_input: filter_input};

            $.ajax({
                type: 'GET',
                data: data,
                url: url,
                dataType: 'JSON'
            })
            .done(function(data){
                let type = data[0].type;
                let input = data[0].input;
                loadMarks(type, input);
            });
        }

        $(document).ready(function(){
            filterMarks();
        });

        $('#uploadButton').on('click', function(){
            uploadMark();
        });

        $('#filterButton').on('click', function(){
            filterMarks();
        });

    </script>
    
    </div></div>
    

    
    <?php 
        include_once "../partials/footer.php";
?>