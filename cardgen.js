
var cardJSON = {
    "ascent": [
        { "color": "cyan" },
        {
            "map": "ascent",
            "img": "images/cards/testCard1.png",
            "desc": "A Execute Back of Generator",
            "media":"images/cards/testcard1.png",
            "type":"img",
            "mDesc":"Molly for hitting the back of generator near A heaven",
            "symbol": "C",
            "tags": ["A Site","A Execute","Execute","Generator","Snakebite"]
        },
        {
            "map": "ascent",
            "img": "images/cards/testCard2.png",
            "desc": "B Retake from A Ramp",
            "media":"images/cards/testCard2.png",
            "type":"img",
            "mDesc":"lands on stairs, you can use a default snakebite to clear triple if you wanna use your 2nd snakebite as well.",
            "symbol": "C",
            "tags": ["B Site", "B Retake", "Retake", "Stairs", "Snakebite"]
        },
        {
            "map": "ascent",
            "img": "images/cards/testCard3_img.png",
            "desc": "One Way Cat (Can't be picked up)",
            "media":"images/cards/testCard3.mp4",
            "type":"video",
            "mDesc":"Orb cant be picked up",
            "symbol": "Q",
            "tags": ["Catwalk", "Mid", "Oneway", "Can't Pickup", "Orb"]
        },
        {
            "map": "ascent",
            "img": "images/cards/testCard3_img.png",
            "desc": "One Way Cat (Can't be picked up)",
            "media":"images/cards/testCard3.mp4",
            "type":"video",
            "mDesc":"Orb cant be picked up",
            "symbol": "Q",
            "tags": ["Catwalk", "Mid", "Oneway", "Can't Pickup", "Orb"]
        }
    ],
    "bind": [
        { "color": "cyan", },
        {
            "map": "bind",
            "img": "images/cards/testCard4.png",
            "desc": "B Site Hall Oneway",
            "media":"images/cards/testCard4.png",
            "type":"img",
            "mDesc":"Oneway for the entrance to B from CT",
            "symbol": "Q",
            "tags": ["Oneway", "B Site", "Orb"]
        },
        {
            "map": "bind",
            "img": "images/cards/testCard4.png",
            "desc": "B Site Hall Oneway",
            "media":"images/cards/testCard4.png",
            "type":"img",
            "mDesc":"Oneway for the entrance to B from CT",
            "symbol": "Q",
            "tags": ["Oneway", "B Site", "Orb"]
        },
        {
            "map": "bind",
            "img": "images/cards/testCard4.png",
            "desc": "B Site Hall Oneway",
            "media":"images/cards/testCard4.png",
            "type":"img",
            "mDesc":"Oneway for the entrance to B from CT",
            "symbol": "Q",
            "tags": ["Oneway", "B Site", "Orb"]
        },
        {
            "map": "bind",
            "img": "images/cards/testCard2.png",
            "desc": "B Retake from A Ramp",
            "media":"images/cards/testCard2.png",
            "type":"img",
            "mDesc":"lands on stairs, you can use a default snakebite to clear triple if you wanna use your 2nd snakebite as well.",
            "symbol": "C",
            "tags": ["B Site", "B Retake", "Retake", "Stairs", "Snakebite"]
        },
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
        iA.innerHTML = `<img src="${pArray[i].img}" alt="none" onclick='seeMore("${pArray[i].media}", "${pArray[i].type}", "${pArray[i].mDesc}")'>`;
        //iA.setAttribute('onclick', 'seeMore(pArray[i].media, pArray[i].type, pArray[i].mDesc)');
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
                if (cardJSON[jsonOb[x]][y].desc.toLowerCase().includes(term)) {
                    filterArray.push(cardJSON[jsonOb[x]][y]);
                    //console.log('broken');
                    break;
                }
                //console.log(z);
                if (cardJSON[jsonOb[x]][y].tags[z].toLowerCase().includes(term)) {
                    filterArray.push(cardJSON[jsonOb[x]][y]);
                    //console.log('broken');
                    break;
                }
            }
        }
    }
    cardJSON.filter = filterArray;
    //console.log(filterArray);
    genCard("filter");
}
function seeMore(media, type, description)
{
    var moreContainer = document.getElementById('cardPop');
    moreContainer.setAttribute('style', 'visibility: shown');
    
    if(type == 'img')
    {
        moreContainer.innerHTML = `<div class='media'>
        <img id="mediaSrc" src="${media}">
    </div>
    <div class='media2'>
        <p>${description}</p>
    </div>
    <button id="mediaQuit" onclick="closeMore()">Close</button>`;
    } else if(type == 'video')
    {
        moreContainer.innerHTML = `<div class='media'>
        
        <video id="mediaSrc" controls >
            <source src="${media}">
        </video>
    </div>
    <div class='media2'>
        <p>${description}</p>
    </div>
    <button id="mediaQuit" onclick="closeMore()">Close</button>`;
    }
}
function closeMore()
{
    document.getElementById('cardPop').setAttribute('style', 'visibility: hidden');
}