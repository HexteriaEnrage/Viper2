
var cardJSON = {
    "ascent": [
        { "color": "cyan", },
        {
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "symbol": "C",
            "tags": ["Orb", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long", "A Site", "A Long", "A Long", "A Long", "A Long", "A Long"]
        },
        {
            "img": "images/placeholder/unknown1.png",
            "desc": "Bind A Molly",
            "symbol": "C",
            "tags": ["Snakebite", "A Site", "A Bath"]
        },
        {
            "img": "images/placeholder/unknown2.png",
            "desc": "A Short Retake Oneway",
            "symbol": "Q",
            "tags": ["Orb", "Oneway", "Retake", "A Site", "A Short"]
        },
        {
            "img": "images/placeholder/unknown1.png",
            "desc": "Bind A Molly",
            "symbol": "C",
            "tags": ["Orb", "B Site", "A Bath"]
        },
        {
            "img": "images/placeholder/unknown1.png",
            "desc": "Bind A Molly",
            "symbol": "C",
            "tags": ["Snakebite", "B Site", "A Bath"]
        }
    ],
    "filter": [

    ]
}
var firstTimeRun = false;
function genCard(map) {
    var container = document.getElementById("cardContainer");
    if (map == 'filter' || firstTimeRun) {
        document.getElementById('clearfilters').setAttribute('style', 'visibility: shown');
    }
    else {
        document.getElementById('clearfilters').setAttribute('style', 'visibility: hidden');
        document.getElementById('sbox').value = '';
        firstTimeRun = true;
    }
    container.innerHTML = '';

    var pArray = cardJSON[map];
    for (i = 1; i < pArray.length; i++) {
        var pDiv = document.createElement('div');
        pDiv.setAttribute('class', 'gallery');
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
                tagDiv.setAttribute('onclick', `filter('${pArray[i].tags[b]}', '${map}')`);
                tagDiv.setAttribute('href', `#${pArray[i].tags[b]}`);
                var tagText = document.createElement('p');
                tagText.textContent = pArray[i].tags[b];
                tagDiv.appendChild(tagText);
                descDiv.appendChild(tagDiv);
            }
        }
        pDiv.appendChild(descDiv);
        container.appendChild(pDiv);
    }
}
function genAll() {
    firstTimeRun = false;
    for (i = 0; i < Object.keys(cardJSON).length - 1; i++) {
        genCard(Object.keys(cardJSON)[i]);

    }
}
var lastSorted;
function filter(filterTag, map) {
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

        console.log(cardJSON[map][u].tags + '\n' + '================');
        for (z = 0; z < cardJSON[map][u].tags.length; z++) {

            if (filterTag == cardJSON[map][u].tags[z]) {
                filterArray.push(cardJSON[map][u]);
                break;
            }
        }
    }
    cardJSON.filter = filterArray;
    console.log(cardJSON.filter);
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
    console.log(term);
    if (term == '') {
        genAll();
        return;
    }
    var pDiv = document.getElementById("cardContainer");
    pDiv.innerHTML = '';
    var filterArray = [];
    filterArray[0] = { "color": "blue" };
    var jsonOb = Object.keys(cardJSON);
    for(x=0; x< jsonOb.length-1;x++)
    {
        for(y=1; y< jsonOb[x].length; y++)
        {
            console.log(cardJSON[jsonOb[x]][y]);
            console.log(cardJSON[jsonOb[x]][y].tags);
            for(z=0;z<cardJSON[jsonOb[x]][y].tags.length; z++)
            {
                if(term == cardJSON[jsonOb[x]][y].tags[z].toLowerCase())
                {
                    filterArray.push(cardJSON[jsonOb[x]][y]);
                    break;
                }
            }
        }
    }
    cardJSON.filter = filterArray;
    genCard("filter");
}