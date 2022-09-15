function Add(){
document.getElementById('Add').classList.remove('hid');
document.getElementById('All').classList.remove('show_all');
document.getElementById('Bestsellers').classList.remove('Best');
document.getElementById('User').classList.remove('User');
document.getElementById('Dis').classList.remove('Dis');

}
function All(){
    document.getElementById('Add').classList.add('hid');
    document.getElementById('All').classList.add('show_all');
    document.getElementById('Bestsellers').classList.remove('Best');
    document.getElementById('User').classList.remove('User');
    document.getElementById('Dis').classList.remove('Dis');
}
function Best(){
    document.getElementById('Add').classList.add('hid');
        document.getElementById('All').classList.remove('show_all');
        document.getElementById('Dis').classList.remove('Dis');
        document.getElementById('User').classList.remove('User');
    document.getElementById('Bestsellers').classList.add('Best');
}
function Dis(){
    document.getElementById('Add').classList.add('hid');
    document.getElementById('All').classList.remove('show_all');
    document.getElementById('Bestsellers').classList.remove('Best');
    document.getElementById('User').classList.remove('User');
    document.getElementById('Dis').classList.add('Dis');
}
function User(){
    document.getElementById('Add').classList.add('hid');
    document.getElementById('All').classList.remove('show_all');
    document.getElementById('Bestsellers').classList.remove('Best');
        document.getElementById('Dis').classList.remove('Dis');
    document.getElementById('User').classList.add('User');

};
