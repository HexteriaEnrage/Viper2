//This is where all of the card data is stored. Needs to be moved to a separate json file when server is built
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
//Basically this is just so that we don't clear everything when we hit home or reset filters.
var firstTimeRun = false;

//Generate the cards, uses a string as the variable.
function genCard(map) {

    //grab the card container div that holds all these
    var container = document.getElementById("cardContainer");

    //If the map is filter, show the clear filters button
    if (map == 'filter') {
        document.getElementById('clearfilters').setAttribute('style', 'visibility: shown');
        container.innerHTML = '';
    }

    //if it is anything else...
    else {

        //hide the clear filters button
        document.getElementById('clearfilters').setAttribute('style', 'visibility: hidden');

        //clear the search bar
        document.getElementById('sbox').value = '';

        //if it's not the first time run, clear out the cards.
        if (!firstTimeRun)
            container.innerHTML = '';
    }

    //grab the cards for a particular map (ex. ascent or even filter)
    var pArray = cardJSON[map];

    //loop through the card data
    for (i = 1; i < pArray.length; i++) {

        //create div for first card
        var pDiv = document.createElement('div');

        //creates the a element that holds the image
        var iA = document.createElement('a');

        //set the image up so that it displays the right stuff when clicked
        iA.innerHTML = `<img src="${pArray[i].img}" alt="none" onclick='seeMore("${pArray[i].media}", "${pArray[i].type}", "${pArray[i].mDesc}")'>`;

        //put iA in the main card container
        pDiv.appendChild(iA);

        //create the little icon at the top right for the ability
        var symbolSprite = document.createElement('img');

        //sets the image to whatever the card data says it should be
        symbolSprite.setAttribute('src', `images/TX_Viper_${pArray[i].symbol}.png`);

        //set the class so it formats correctly
        symbolSprite.setAttribute('class', 'card-symbol card-c');

        //add the ability symbol to the main card container
        pDiv.appendChild(symbolSprite);

        //create the description div that contains the description and tags
        var descDiv = document.createElement('div');

        //set class
        descDiv.setAttribute('class', 'card-desc');

        //add the description
        descDiv.innerHTML = `<p>${pArray[i].desc}</p>`

        //Loop through the tags. Do not do it if there are no tags.
        if (pArray[i].tags != undefined) {
            for (b = 0; b < pArray[i].tags.length; b++) {

                //create a div for the tag
                var tagDiv = document.createElement('div');

                //set class and onclick event
                tagDiv.setAttribute('class', 'tag');
                tagDiv.setAttribute('onclick', `filter('${pArray[i].tags[b]}', '${pArray[i].map}')`);

                //create the tag label and attach it.
                var tagText = document.createElement('p');
                tagText.textContent = pArray[i].tags[b];
                tagDiv.appendChild(tagText);

                //attach tag to the description div
                descDiv.appendChild(tagDiv);
            }
        }

        //add description div to card
        pDiv.appendChild(descDiv);

        //set the class to gallery for the card, but also set the drop shadow class to match the map color
        pDiv.setAttribute('class', `gallery g${pArray[i].map}`);

        //add to card container
        container.appendChild(pDiv);
    }
}
//function for generating all maps but filter
function genAll() {
    //go through all the maps aside from filter
    for (o = 0; o < Object.keys(cardJSON).length - 1; o++) {
        //generate the cards for this map
        genCard(Object.keys(cardJSON)[o]);
        //make sure the container doesn't clear after the first genCard that automatically clears
        firstTimeRun = true;
    }
    //make it so the next time genCard is run the div clears
    firstTimeRun = false;
}

//dummy value. Store this so that if we accidentally try to filter the filter map, it filters the previous map instead
var lastSorted = 'five';

//filter by tag (tag contents, map)
function filter(filterTag, map) {

    //if we try to filter by filter, set it to the last generated map
    if (map == 'filter') {
        map = lastSorted;
    } else {

        //if we're not filtering by filter, set the backup
        lastSorted = map;
    }

    //temporary storage of the filter map object to contain card data
    var filterArray = [];

    //set the first value. This value is never used...
    filterArray[0] = cardJSON[map][0];

    //loop through the card data
    for (u = 1; u < cardJSON[map].length; u++) {

        //loop through the tags in the card data
        for (z = 0; z < cardJSON[map][u].tags.length; z++) {

            //compare the search term to the tag
            if (filterTag == cardJSON[map][u].tags[z]) {

                //push the card data the matching filter is contained in to the filter array
                filterArray.push(cardJSON[map][u]);

                //break out of the loop to avoid going through more tags unecessarily
                break;
            }
        }
    }

    //replace the filter object with the tag matches
    cardJSON.filter = filterArray;

    //generate the matching cards
    genCard("filter");
}

//if someone presses enter in the search box, do a search.
function sBoxPress(event) {
    if (event.keyCode == 13) {
        search();
    }
}

//search function. Works basically like filter except includes the description as well
function search() {

    //grab the text from the search box and make sure it's lowercase
    var term = document.getElementById('sbox').value;
    term = term.toLowerCase();
    
    //if some dumbass didn't put anything in but pressed enter anyways, just generate all the cards again.
    if (term == '') {
        genAll();
        return;
    }

    //yeah you know what this all is from filter.
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