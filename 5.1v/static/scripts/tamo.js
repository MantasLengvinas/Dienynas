//Front end functions

function showModal(){
    var modal = document.getElementById('myModal');
    modal.classList.toggle('show');
}

function reload(){
    setTimeout(function() {
        location.reload();
      }, 3000);
}

//Admin requests

let users = (id) =>{
    document.getElementById('loader').classList.remove('hidden');
    $('html').css('opacity', '0.6');
    $('.date_selector div').removeClass('date_active');
    $(id).parent().addClass('date_active');
    $.ajax({
        type: 'GET',
        url: '../Admin/users.php',
    })
    .done(function(data){
        $('#admin_content').html(data);
        document.getElementById('loader').classList.add('hidden');
        $('html').css('opacity', '1');
    });
}

let marks = (id) =>{
    document.getElementById('loader').classList.remove('hidden');
    $('html').css('opacity', '0.6');
    $('.date_selector div').removeClass('date_active');
    $(id).parent().addClass('date_active');
    $.ajax({
        type: 'GET',
        url: '../Admin/marks.php',
    })
    .done(function(data){
        $('#admin_content').html(data);
        document.getElementById('loader').classList.add('hidden');
        $('html').css('opacity', '1');
    });
}

let subjects = (id) =>{
    document.getElementById('loader').classList.remove('hidden');
    $('html').css('opacity', '0.6');
    $('.date_selector div').removeClass('date_active');
    $(id).parent().addClass('date_active');
    $.ajax({
        type: 'GET',
        url: '../Admin/subjects.php',
    })
    .done(function(data){
        $('#admin_content').html(data);
        document.getElementById('loader').classList.add('hidden');
        $('html').css('opacity', '1');
    });
}

let moreInfo = id =>{
    $.ajax({
        type: 'GET',
        data: {id: id},
        url: '../Admin/userInfo.php'
    })
    .done(function(data){
        $('#moreInfo-response').html(data);
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

let createUser = () =>{
    let username = $("#username").val();
    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let school = $("#school").val();
    let role = $("#role").val();

    let data = {
        username: username, 
        firstname: firstname, 
        lastname: lastname,
        email: email, 
        password: password,
        school: school,
        role: role
    };

    $.ajax({
        type: 'POST',
        data: data, 
        url: '../Admin/createUser.php'
    })
    .done(function(data){
        $("#user-response").html(data);
        reload();
    })
}

let deleteUser = (id) =>{

    var con = confirm("Vartotojas bus ištrintas");

    if(con){
        $.ajax({
            type: 'POST',
            data: {id: id}, 
            url: '../Admin/deleteUser.php'
        })
        .done(function(data){
            $("#user-response").html(data);
            showModal();
            reload();
        })
    }
}

//User requests

let monthInfo = [
    [0, 'Pr', 'An', 'Tr', 'Kt', 'Pn', 'Št', 'Sk'],
    [0, 'SAUSIS', 'VASARIS', 'KOVAS', 'BALANDIS', 
    'GEGUŽĖ', 'BIRŽELIS', 'LIEPA', 'RUGPJŪTIS', 
    'RUGSĖJIS', 'SPALIS', 'LAPKRITIS', 'GRUODIS']
];

let loadTable = (id) =>{
    document.getElementById('loader').classList.remove('hidden');
    $('html').css('opacity', '0.6');
    $('.date_selector div').removeClass('date_active');
    $(id).parent().addClass('date_active');
    let metai = $(id).data('metai');
    let menuo = $(id).data('menuo');
    let data = {metai: metai, menuo: menuo, info: monthInfo};
    let url = '../Pamoka/DienynasTable';

    $.ajax({
        type: 'POST',
        url: url,
        data: data
    })
    .done(function(data){
        $('#timetable_content').html(data);
        //loadMarks(id);
        document.getElementById('loader').classList.add('hidden');
        $('html').css('opacity', '1');
        scrollTimeTable(metai, menuo);
    });
}

let loadMarks = (id) =>{
    let metai = $(id).data('metai');
    let menuo = $(id).data('menuo');
    let data = {metai: metai, menuo: menuo, info: monthInfo};
    let url = '../Pamoka/DienynasMarks';
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