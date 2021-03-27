var cardJSON = {
    "ascent": [
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
function genCard(map) {
    if(map == 'filter')
    {
        document.getElementById('clearfilters').setAttribute('style','visibility: shown');
        container.innerHTML='';
    }
    else
    {
        document.getElementById('clearfilters').setAttribute('style','visibility: hidden');
    }
    var container = document.getElementById("cardContainer");
    
    var pArray = cardJSON[map];
    for (i = 0; i < pArray.length; i++) {
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
function genAll()
{
    console.log(cardJSON.length);
    
    for (i=0;i<Object.keys(cardJSON).length-1;i++)
    {
        console.log(cardJSON[i]);
        genCard(Object.keys(cardJSON)[i]);
        
    }
}
var lastSorted;
function filter(filterTag, map) {
    if(map == 'filter')
    {
        map = lastSorted;
    } else {
        lastSorted = map;
    }
    var pDiv = document.getElementById("cardContainer");
    pDiv.innerHTML = '';

    var filterArray = [];
    for (u = 0; u < cardJSON[map].length; u++) {

        console.log(cardJSON[map][u].tags + '\n' + '================');
        for (z = 0; z < cardJSON[map][u].tags.length; z++) {

            if (filterTag == cardJSON[map][u].tags[z]) {
                filterArray.push(cardJSON[map][u]);
                console.log(cardJSON[map][u].tags);
                break;
            }
        }
    }
    cardJSON.filter = filterArray;
    console.log(cardJSON.filter);
    genCard("filter");
}