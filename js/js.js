function show_nav(){
    document.getElementById('navbar').classList.add('opeNnav');
}
function hide(){
  document.getElementById('navbar').classList.remove('opeNnav');
}
let img =document.getElementById('main_img');
function photo(photo){
  img.src=photo;
}

let right = document.getElementById('right');
let left = document.getElementById('left');
let right2 = document.getElementById('right2');
let left2 = document.getElementById('left2');

right.addEventListener('click', function(){
  document.getElementById('best_prodected').scrollLeft += 120
})
left.addEventListener('click', function(){
  document.getElementById('best_prodected').scrollLeft -= 120
})

right2.addEventListener('click', function(){
  document.getElementById('sled_dis').scrollLeft += 120
})
left2.addEventListener('click', function(){
  document.getElementById('sled_dis').scrollLeft -= 120
})


// ---------producted--------
function show_typy(){
  document.getElementById('down').classList.add('opedown');
  document.getElementById('heed_list').classList.add('heed_list');
  document.getElementById('clo').classList.add('show_clo');

}
function hidn3(){
  document.getElementById('down').classList.remove('opedown');
  document.getElementById('heed_list').classList.remove('heed_list');
  document.getElementById('clo').classList.remove('show_clo');
}

function Chair(){
  document.getElementById('Chair').classList.remove('hideen');
  document.getElementById('Table').classList.remove('show');
  document.getElementById('bed').classList.remove('show2');
  document.getElementById('Antiques').classList.remove('show3');
  document.getElementById('Chandelier').classList.remove('show4');
  document.getElementById('food').classList.remove('show5');
}
function Table(){
  document.getElementById('Chair').classList.add('hideen');
  document.getElementById('Table').classList.add('show');
  document.getElementById('bed').classList.remove('show2');
  document.getElementById('Antiques').classList.remove('show3');
  document.getElementById('Chandelier').classList.remove('show4');
  document.getElementById('food').classList.remove('show5');

}

function bed(){
  document.getElementById('Chair').classList.add('hideen');
  document.getElementById('Table').classList.remove('show');
  document.getElementById('Antiques').classList.remove('show3');
    document.getElementById('Chandelier').classList.remove('show4');
    document.getElementById('food').classList.remove('show5');
  document.getElementById('bed').classList.add('show2');
}


function Antiques(){
  document.getElementById('Chair').classList.add('hideen');
  document.getElementById('Table').classList.remove('show');
  document.getElementById('bed').classList.remove('show2');
  document.getElementById('Chandelier').classList.remove('show4');
  document.getElementById('food').classList.remove('show5');
  document.getElementById('Antiques').classList.add('show3');

}
function Chandelier(){
  document.getElementById('Chair').classList.add('hideen');
  document.getElementById('Table').classList.remove('show');
  document.getElementById('bed').classList.remove('show2');
  document.getElementById('Antiques').classList.remove('show3');
  document.getElementById('food').classList.remove('show5');
  document.getElementById('Chandelier').classList.add('show4');
}

function food(){
  document.getElementById('Chair').classList.add('hideen');
  document.getElementById('Table').classList.remove('show');
  document.getElementById('bed').classList.remove('show2');
  document.getElementById('Antiques').classList.remove('show3');
  document.getElementById('Chandelier').classList.remove('show4');
  document.getElementById('food').classList.add('show5');

}


