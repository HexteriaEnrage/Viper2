
var cardJSON = {
    "ascent": [
        { "color": "cyan" },
        {
            "map": "ascent",
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "symbol": "Q",
            "tags": ["Orb", "ascent", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long"]
        },
        {
            "map": "ascent",
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "symbol": "Q",
            "tags": ["Orb", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long"]
        },
        {
            "map": "ascent",
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "symbol": "C",
            "tags": ["Snakebite", "ascent", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long"]
        },
        {
            "map": "ascent",
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "symbol": "C",
            "tags": ["Snakebite", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long"]
        },
        {
            "map": "ascent",
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "symbol": "X",
            "tags": ["Ultimate", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long"]
        }
    ],
    "bind": [
        { "color": "cyan", },
        {
            "map": "bind",
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "symbol": "Q",
            "tags": ["Orb", "bind", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long"]
        },
        {
            "map": "bind",
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "symbol": "C",
            "tags": ["Orb", "tester", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long"]
        },
        {
            "map": "bind",
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "symbol": "C",
            "tags": ["Orb", "tester2", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long"]
        },
        {
            "map": "bind",
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "symbol": "C",
            "tags": ["Orb", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long"]
        },
        {
            "map": "bind",
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "symbol": "C",
            "tags": ["Orb", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long"]
        }
    ],
    "filter": [

    ]
}
var firstTimeRun = false;
function genCard(map) {
    var container = document.getElementById("cardContainer");
    if (map == 'filter') {
        document.getElementById('clearfilters').setAttribute('style', 'visibility: shown');
    }
    else {
        document.getElementById('clearfilters').setAttribute('style', 'visibility: hidden');
        document.getElementById('sbox').value = '';
        if (!firstTimeRun)
            container.innerHTML = '';
    }


    var pArray = cardJSON[map];
    for (i = 1; i < pArray.length; i++) {
        var pDiv = document.createElement('div');


        var iA = document.createElement('a');
        iA.innerHTML = `<img src="${pArray[i].img}" alt="" >`;
        //iA.setAttribute('href', 'pArray[i].img');
        pDiv.appendChild(iA);
        var symbolSprite = document.createElement('img');
        symbolSprite.setAttribute('src', `images/TX_Viper_${pArray[i].symbol}.png`);
        symbolSprite.setAttribute('class', 'card-symbol card-c');
        pDiv.appendChild(symbolSprite);
        var descDiv = document.createElement('div');
        descDiv.setAttribute('class', 'card-desc');
        descDiv.innerHTML = `<p>${pArray[i].desc}</p>`

        if (pArray[i].tags != null) {
            for (b = 0; b < pArray[i].tags.length; b++) {
                var tagDiv = document.createElement('div');
                tagDiv.setAttribute('class', 'tag');
                tagDiv.setAttribute('onclick', `filter('${pArray[i].tags[b]}', '${pArray[i].map}')`);
                tagDiv.setAttribute('href', `#${pArray[i].tags[b]}`);
                var tagText = document.createElement('p');
                tagText.textContent = pArray[i].tags[b];
                tagDiv.appendChild(tagText);
                descDiv.appendChild(tagDiv);
            }
        }
        pDiv.appendChild(descDiv);
        pDiv.setAttribute('class', `gallery g${pArray[i].map}`);
        container.appendChild(pDiv);
    }
}
function genAll() {
    var container = document.getElementById("cardContainer").innerHTML = '';
    firstTimeRun = true;
    for (o = 0; o < Object.keys(cardJSON).length - 1; o++) {
        genCard(Object.keys(cardJSON)[o]);
        //console.log(o);
        //console.log(Object.keys(cardJSON));
    }
    firstTimeRun = false;
}
var lastSorted = 'five';

function filter(filterTag, map) {
    //console.log(map);
    if (map == 'filter') {
        map = lastSorted;
    } else {
        lastSorted = map;
    }
    var pDiv = document.getElementById("cardContainer");
    pDiv.innerHTML = '';

    var filterArray = [];

    filterArray[0] = cardJSON[map][0];
    for (u = 1; u < cardJSON[map].length; u++) {

        for (z = 0; z < cardJSON[map][u].tags.length; z++) {

            if (filterTag == cardJSON[map][u].tags[z]) {
                filterArray.push(cardJSON[map][u]);
                break;
            }
        }
    }
    cardJSON.filter = filterArray;
    //console.log(cardJSON.filter);
    genCard("filter");
}
function sBoxPress(event) {
    if (event.keyCode == 13) {
        search();
    }
}
function search() {
    var term = document.getElementById('sbox').value;
    term = term.toLowerCase();
    //console.log(term);
    if (term == '') {
        genAll();
        return;
    }
    var pDiv = document.getElementById("cardContainer");
    pDiv.innerHTML = '';
    var filterArray = [];
    filterArray[0] = { "color": "blue" };
    var jsonOb = Object.keys(cardJSON);
    for (x = 0; x < jsonOb.length - 1; x++) {
        for (y = 1; y < cardJSON[jsonOb[x]].length; y++) {
            
            //console.log(cardJSON[jsonOb[x]]);
            //console.log(y);
            for (z = 0; z < cardJSON[jsonOb[x]][y].tags.length; z++) {
                //console.log(z);
                if (cardJSON[jsonOb[x]][y].tags[z].toLowerCase().includes(term)) {
                    filterArray.push(cardJSON[jsonOb[x]][y]);
                    //console.log('broken');
                    z=cardJSON[jsonOb[x]][y].tags.length+1;
                }
            }
        }
    }
    cardJSON.filter = filterArray;
    //console.log(filterArray);
    genCard("filter");
}