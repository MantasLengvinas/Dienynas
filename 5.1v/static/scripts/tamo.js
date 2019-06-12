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

function startLoading(){
    document.getElementById('loader').classList.remove('hidden');
    $('html').css('opacity', '0.6');
}

function stopLoading(){
    document.getElementById('loader').classList.add('hidden');
    $('html').css('opacity', '1');
}

//Admin requests

let users = (id) =>{
    startLoading();
    $('.date_selector div').removeClass('date_active');
    $(id).parent().addClass('date_active');
    $.ajax({
        type: 'GET',
        url: '../Admin/Users.php',
    })
    .done(function(data){
        $('#admin_content').html(data);
        stopLoading();
    });
}

let marks = (id) =>{
    startLoading();
    $('.date_selector div').removeClass('date_active');
    $(id).parent().addClass('date_active');
    $.ajax({
        type: 'GET',
        url: '../Admin/Marks.php',
    })
    .done(function(data){
        $('#admin_content').html(data);
        stopLoading();
    });
}

let subjects = (id) =>{
    startLoading();
    $('.date_selector div').removeClass('date_active');
    $(id).parent().addClass('date_active');
    $.ajax({
        type: 'GET',
        url: '../Admin/Subjects.php',
    })
    .done(function(data){
        $('#admin_content').html(data);
        stopLoading();
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

let getUser

//User requests

let monthInfo = [
    [0, 'Pr', 'An', 'Tr', 'Kt', 'Pn', 'Št', 'Sk'],
    [0, 'SAUSIS', 'VASARIS', 'KOVAS', 'BALANDIS', 
    'GEGUŽĖ', 'BIRŽELIS', 'LIEPA', 'RUGPJŪTIS', 
    'RUGSĖJIS', 'SPALIS', 'LAPKRITIS', 'GRUODIS']
];

let loadTable = (id) =>{
    startLoading();
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
        stopLoading();
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
        stopLoading();
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