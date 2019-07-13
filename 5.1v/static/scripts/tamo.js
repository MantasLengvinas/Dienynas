//Front end functions

function showModal() {
    var modal = document.getElementById('myModal');
    modal.classList.toggle('show');
}

function reload() {
    setTimeout(function () {
        location.reload();
    }, 3000);
}

function startLoading() {
    document.getElementById('loader').classList.remove('hidden');
    $('html').css('opacity', '0.6');
}

function stopLoading() {
    document.getElementById('loader').classList.add('hidden');
    $('html').css('opacity', '1');
}

//Admin requests

let users = () => {
    startLoading();
    $("#admin_page_header").html('Vartotojai');
    $.ajax({
        type: 'GET',
        url: '../Admin/Users.php',
    })
    .done(function (data) {
        $('#admin_content').html(data);
        stopLoading();
    });
}

let marks = () => {
    startLoading();
    $("#admin_page_header").html('Pažymiai');
    $.ajax({
            type: 'GET',
            url: '../Admin/Marks.php',
        })
        .done(function (data) {
            $('#admin_content').html(data);
            stopLoading();
        });
}

let subjects = () => {
    startLoading();
    $("#admin_page_header").html('Dalykai');
    $.ajax({
            type: 'GET',
            url: '../Admin/Subjects.php',
        })
        .done(function (data) {
            $('#admin_content').html(data);
            stopLoading();
        });
}

let sessions = () => {
    startLoading();
    $("#admin_page_header").html('Prisijungimai');
    $.ajax({
            type: 'GET',
            url: '../Admin/Sessions.php',
        })
        .done(function (data) {
            $('#admin_content').html(data);
            stopLoading();
        });
}

let logs = () => {
    startLoading();
    $("#admin_page_header").html('Žurnalas');
    $.ajax({
            type: 'GET',
            url: '../Admin/Logs.php',
        })
        .done(function (data) {
            $('#admin_content').html(data);
            stopLoading();
        });
}

let siteInfo = () => {
    startLoading();
    $("#admin_page_header").html('Informacija');
    $.ajax({
            type: 'GET',
            url: '../Admin/siteInfo.php',
        })
        .done(function (data) {
            $('#admin_content').html(data);
            stopLoading();
        });
}

let moreInfo = id => {
    $.ajax({
            type: 'GET',
            data: {
                id: id
            },
            url: '../Admin/userInfo.php'
        })
        .done(function (data) {
            $('#moreInfo-response').html(data);
            var closeBtn = document.getElementById('closeModalBtn');
            closeBtn.onclick = function () {
                showModal();
            }
        })
}

let createUser = () => {
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
        .done(function(data) {
            $("#user-response").html(data);
            reload();
        })
}

let deleteUser = (id) => {

    var con = confirm("Vartotojas bus ištrintas");

    if (con) {
        $.ajax({
            type: 'POST',
            data: {
                id: id
            },
            url: '../Admin/deleteUser.php'
        })
        .done(function(data) {
            $("#user-response").html(data);
            showModal();
            reload();
        })
    }
}

let searchUser = (value) => {
    $.ajax({
        type: 'GET',
        url: '../Admin/Users.php',
        data: {value: value}
    })
    .done(function (data) {
        $('#admin_content').html(data);
        stopLoading();
    });
}

let prepareMark = () => {

    let username = $("#student").val();
    startLoading();

    $.ajax({
            type: 'POST',
            data: {
                username: username,
                monthInfo: monthInfo
            },
            url: '../Admin/prepareMark.php'
        })
        .done(function (data) {
            $("#prepareMark-response").html(data);
            stopLoading();
        })

}

let uploadMark = () => {

    startLoading();

    let student = $("#student").val();
    let subject = $("#subject").val();
    let year = $("#year").val();
    let month = $("#month").val();
    let day = $("#day").val();
    let mark = $("#mark").val();
    let type = $("#type").val();

    let data = {
        student: student,
        subject: subject,
        year: year,
        month: month,
        day: day,
        mark: mark,
        type: type
    };

    $.post({
            url: '../Admin/uploadMark.php',
            data: data
        })
        .done(function (data) {
            $("#modal-response").html(data);
            stopLoading();
        })
}

let uploadSubject = () => {

    startLoading();

    let student = $("#student").val();
    let subject = $("#subject").val();
    let teacher = $("#teacher").val();

    let data = {
        st: student,
        s: subject,
        t: teacher
    };

    $.post({
            data: data,
            url: '../Admin/uploadSubject.php'
        })
        .done(function (data) {
            $("#uploadsubject-response").html(data);
            stopLoading();
        })
}

let loadMarksContent = () => {
    prepareMark();
    //periodData();
}

let periodData = () => {
    startLoading();
    let username = $("#student").val();
    let data = {uid: username};

    $.get({
            url: '../Admin/periodData.php',
            data: data
        })
        .done(function (data) {
            $("#periodData-response").html(data);
            stopLoading();
        })

}

let sessionInfo = (id) =>{

    let data = {id: id};

    $.ajax({
        type: 'GET',
        data: data,
        url: '../Admin/sessionInfo.php'
    })
    .done(function (data) {
        $('#sessionInfo-response').html(data);
        var closeBtn = document.getElementById('closeModalBtn');
        closeBtn.onclick = function () {
            showModal();
        }
    });
}

//User requests

let monthInfo = [
    [0, 'Pr', 'An', 'Tr', 'Kt', 'Pn', 'Št', 'Sk'],
    [0, 'SAUSIS', 'VASARIS', 'KOVAS', 'BALANDIS',
        'GEGUŽĖ', 'BIRŽELIS', 'LIEPA', 'RUGPJŪTIS',
        'RUGSĖJIS', 'SPALIS', 'LAPKRITIS', 'GRUODIS'
    ]
];

let loadTable = (id) => {
    startLoading();
    $('.date_selector div').removeClass('date_active');
    $(id).parent().addClass('date_active');
    let metai = $(id).data('metai');
    let menuo = $(id).data('menuo');
    let data = {
        metai: metai,
        menuo: menuo,
        info: monthInfo
    };
    let url = '../Pamoka/DienynasTable';

    $.ajax({
            type: 'POST',
            url: url,
            data: data
        })
        .done(function (data) {
            $('#timetable_content').html(data);
            loadMarks(id);
            stopLoading();
            scrollTimeTable(metai, menuo);
        });
}

let loadMarks = (id) => {
    let metai = $(id).data('metai');
    let menuo = $(id).data('menuo');
    let data = {
        metai: metai,
        menuo: menuo
    };
    let url = '../Pamoka/DienynasMarks.php';
    $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'JSON'
        })
        .done(function (data) {
            writeMarks(data);
            stopLoading();
        });
}

let scrollTimeTable = (metai, menuo) => {
    var date = new Date();
    let thisMonth = date.getMonth() + 1;
    let thisYear = date.getFullYear();
    var today_year = thisYear;
    var today_month = thisMonth;
    var today_day = date.getDate();
    if (metai == today_year && menuo == today_month) {
        $("#scrollable_dienynas").scrollLeft(28 * (today_day - 16));
    }
}

let setPeriodDesc = (period, data) => {

    let name;

    switch(period){
        case '0':
            name = 'Metinis';
        break;
        case '1':
            name = `1 pusmetis, ${data[0]}`;
        break;
        case '2':
            name = `2 pusmetis, ${data[1]}`;
    }

    $('#header_description').html(name);
}

let loadPeriodTable = (data) => {
    startLoading();
    let period = $('#laikotarpis').val();
    setPeriodDesc(period, data);
    let url = '../PeriodoVertinimas/periodTable.php';

    $.post({
        url: url,
        data: {p: period}
    })
    .done(function(data){
        $('#periodtable-response').html(data);
        stopLoading();
    })
}