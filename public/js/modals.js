var toggles = document.querySelectorAll('[data-toggle="modal"]');
toggles.forEach((elem)=>{
    elem.addEventListener('click',(e)=>{
        var modalID = elem.getAttribute('data-target');
        var modal = document.querySelector(modalID);
        modal.classList.remove('hidden');
        setTimeout(()=>{modal.classList.add('show')},10);
        e.stopPropagation();
        e.preventDefault();
    })
});

var dismisses = document.querySelectorAll('[data-dismiss="modal"]');
dismisses.forEach((elem)=>{
    elem.addEventListener('click',()=>{
        var modal = elem.closest('.modal');
        modal.classList.remove('show');
    });
});

var modals = document.querySelectorAll('.modal');
modals.forEach((elem)=>{
    if(!elem.classList.contains('hidden')) elem.classList.add('hidden');
    elem.addEventListener('transitionend',()=>{
        var style = window.getComputedStyle(elem);
        if(style.opacity==='0') {
            elem.classList.add('hidden');
            Livewire.emit('modal.closed');
        }
        else elem.classList.remove('hidden');
    });
});

window.addEventListener('click',(e)=>{
    var modalShown = document.querySelector('.modal.show');
    if (e.target===modalShown) modalShown.classList.remove('show');
});

