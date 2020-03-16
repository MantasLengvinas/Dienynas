//Front end functions

function showModal() {
    var modal = document.getElementById('myModal');
    modal.classList.toggle('show');
}

function startLoading() {
    document.getElementById('loader').classList.remove('hidden');
    $('html').css('opacity', '0.6');
}

function stopLoading() {
    document.getElementById('loader').classList.add('hidden');
    $('html').css('opacity', '1');
}

function Notify(title, data, type) {
    $('#response_title').html(title);
    if(!type){
        $('#response_window').attr("class", "brighttheme ui-pnotify-container brighttheme-error ui-pnotify-shadow");
    }
    $("#response_content").html(data);
    $('#response_window').fadeToggle("slow", () => {
        setTimeout(() => {
            $('#response_window').fadeToggle("slow");
        }, 4500);
    });    
}

//Admin requests

let moreInfo = id => {
    $.ajax({
            type: 'GET',
            data: {
                id: id
            },
            url: '../Requests/userInfo.php'
        })
        .done(function (data) {
            $('#moreInfo-response').html(data);
            var closeBtn = document.getElementById('closeModalBtn');
            closeBtn.onclick = function () {
                showModal();
            }
        })
}

let showXML = () => {

    startLoading();
    let db = $('#database').val();

    let data = {database: db};
    $.ajax({
        type: 'POST',
        data: data,
        url: '../Requests/showXML.php'
    })
    .done(function(data) {
        $("#sql_view").html(data);
        stopLoading();
    })
}

let downloadSQL = () => {
    startLoading();
    let db = $('#database').val();

    let data = {database: db};
    $.ajax({
        type: 'POST',
        data: data,
        url: '../Requests/downloadSQL.php'
    })
    .done(function(data) {
        data = JSON.parse(data);
        stopLoading();
        Notify(data.title, data.content, data.status);
    })
}

let exportDB = () => {
    
}

let createUser = () => {
    let username = $("#username").val();
    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let school = $("#school").val();
    let re = document.getElementById('role');
    let role = 0;

    if(re.checked){
        role = 1
    }

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
        url: '../Requests/createUser.php'
    })
    .done(function(data) {
        users();
        data = JSON.parse(data);
        stopLoading();
        Notify(data.title, data.content, data.status);
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
            url: '../Requests/deleteUser.php'
        })
        .done(function(data) {
            users();
            data = JSON.parse(data);
            Notify(data.title, data.content, data.status);
            showModal();
        })
    }
}

let searchUser = (value) => {
    startLoading();
    $.ajax({
        type: 'GET',
        url: '../Requests/Users.php',
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
            url: '../Requests/prepareMark.php'
        })
        .done(function (data) {
            $("#prepareMark-response").html(data);
            console.log("success");
            stopLoading();
        })

}

let showMarks = () => {
    let username = $("#student").val();

    $.ajax({
        type: 'GET',
        data: {
            username: username
        },
        url: '../Requests/showMarks.php'
    })
    .done(function (data) {
        $("#showmarks-response").html(data);
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
            url: '../Requests/uploadMark.php',
            data: data
        })
        .done(function (data) {
            data = JSON.parse(data);
            showMarks();
            stopLoading();
            Notify(data.title, data.content, data.status);
        })
}

let deleteMark = id => {
    startLoading();
    let username = $("#student").val();

    var con = confirm("Vartotojas bus ištrintas");

    if(con){
        $.ajax({
            type: 'POST',
            data: {
                username: username,
                id: id
            },
            url: '../Requests/deleteMark.php'
        })
        .done(function (data) {
            data = JSON.parse(data);
            stopLoading();
            Notify(data.title, data.content, data.status);
            showMarks();
        })
    }
    else{
        stopLoading();
    }
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
            url: '../Requests/uploadSubject.php'
        })
        .done(function (data) {
            data = JSON.parse(data);
            stopLoading();
            Notify(data.title, data.content, data.status);
            showMarks();
        })
}

let loadMarksContent = () => {
    prepareMark();
    showMarks();
}

let periodData = () => {
    startLoading();
    let username = $("#student").val();
    let data = {uid: username};

    $.get({
            url: '../Requests/periodData.php',
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
        url: '../Requests/sessionInfo.php'
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

let dateSelectors = [];

function toTimestamp(strDate){
    var datum = Date.parse(strDate);
    return datum/1000;
}

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
            stopLoading();
            scrollTimeTable(metai, menuo);
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

let dateSelector = () => {

    var date = new Date();
    let metai = date.getFullYear();
    let menuo = date.getMonth() + 1;
    let day = date.getDate();

    $('.date_selector div').children('a').each(function () {
        let dsts = toTimestamp(`${$(this).data('metai')} ${$(this).data('menuo')} 1 0:0:0`);
        let cts = toTimestamp(`${metai} ${menuo} ${day} 0:0:0`);
        
        if (dsts <= cts) {
            $(this).parent().removeClass('hidden');
        }
    });
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