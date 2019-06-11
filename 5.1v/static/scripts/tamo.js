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