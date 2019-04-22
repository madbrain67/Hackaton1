const btn = document.querySelector('#randomizeButton');
const btn1 = document.querySelector('#buttoX5');
const btn2 = document.querySelector('#buttoX10');
const results = {
    machine1: document.querySelector('#machine1Result'),
    machine2: document.querySelector('#machine2Result'),
    machine3: document.querySelector('#machine3Result'),
    machine4: document.querySelector('#machine4Result'),
    machine5: document.querySelector('#machine5Result'),
    machine6: document.querySelector('#machine6Result')
};
const el1 = document.querySelector('#machine1');
const el2 = document.querySelector('#machine2');
const el3 = document.querySelector('#machine3');
const el4 = document.querySelector('#machine4');
const el5 = document.querySelector('#machine5');
const el6 = document.querySelector('#machine6');
const machine1 = new SlotMachine(el1, {
    active: 0
});
const machine2 = new SlotMachine(el2, {
    active: 1
});
const machine3 = new SlotMachine(el3, {
    active: 2
});
const machine4 = new SlotMachine(el4, {
    active: 3
});
const machine5 = new SlotMachine(el5, {
    active: 4
});
const machine6 = new SlotMachine(el6, {
    active: 5
});

function startCounter(){
    $("#gagner").text('No gain');
    $('#carteSoundRoulement')[0].play();
    var scored = new Array();
    return scored;
}

function onComplete(active) {
    results[this.element.id].innerText = `${this.active}`;
    scored.push(`${this.active}`);
}

function traitementPHP(gains,mise,resultat) {
    $('#carteSoundRoulement')[0].pause();
    $.ajax({
        type: "POST",
        url: '/action.php',
        data: {'gains': gains, 'mise': mise, 'resultat': resultat},
        async: true,
        success: function(result) {
            var data = result.split('|');
            $("#gagner").text('Gain:' + data[0]);
            if(parseInt(data[0]) > 0) {
                $("#gain").text(data[1]);
                $('#carteSoundGains')[0].play();
            }
        }
    });
}

function traitement(mise) {
    scored = startCounter();
    var gains = $("#gain").text();
    var new_gains = gains - mise;
    $("#gain").text(new_gains);
    machine1.shuffle(5, onComplete);
    setTimeout(() => machine2.shuffle(5, onComplete), 300);
    setTimeout(() => machine3.shuffle(5, onComplete), 600);
    setTimeout(() => machine4.shuffle(5, onComplete), 900);
    setTimeout(() => machine5.shuffle(5, onComplete), 1200);
    setTimeout(() => machine6.shuffle(5, onComplete), 1500);
    setTimeout(() => traitementPHP(new_gains,mise,scored), 3000);
}

btn.addEventListener('click', () => { traitement(2); });
btn1.addEventListener('click', () => { traitement(5); });
btn2.addEventListener('click', () => { traitement(10); });