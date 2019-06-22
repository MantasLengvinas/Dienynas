var date = new Date();
let today = date.getDate();
let thisMonth = date.getMonth() + 1;
let curr = ~~(Date.now() / 1000);

function toTimestamp(strDate){
   var datum = Date.parse(strDate);
   return datum/1000;
}

let writeMarks = (data) =>{

    data.forEach(mark => {
        let mid = 'm' + mark.month + 'd' + mark.day + 's' + mark.subject;
        let cell = document.getElementById(mid);
        cell.classList.add('recent-mark');
        if(mark.mark !== '0'){
           $(cell).append(`<div style="padding:0;margin:0;vertical-align:middle">${mark.mark}<span class="fa fa-circle ${markType(mark.type)}" style="vertical-align:middle;font-weight:bold;font-size:10px;padding-left:2px;margin-top:-2px"></span></div>`);
        }else{
           $(cell).append(`<div style="padding:0;margin:0;vertical-align:middle">įsk.<span class="fa fa-circle ${markType(mark.type)}" style="vertical-align:middle;font-weight:bold;font-size:10px;padding-left:2px;margin-top:-2px"></span></div>`);
        }
        if(abs(toTimestamp(mark.timestamp) - curr) >= 432000){
            cell.classList.remove('recent-mark');
        }
    });
}

let markType = id =>{
    let color = 0;
    id = parseInt(id);
    switch(id){
        case 0:
            color = 'color_kontr';
        break;
        case 1:
            color = 'color_sav';
        break;
        case 2:
            color = 'color_klases';
        break;
        case 3:
            color = 'color_kaupiamasis';
        break;
        case 4: 
            color = 'color_praktinis';
        break;
        case 5:
            color = 'color_namu';
        break;
        case 6:
            color = 'color_iskaita';
    }
    return color;
}

