var cardJSON = {
    "ascent": [
        {
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "symbol": "C",
            "tags": ["Orb","A Site","A Long","A Long","A Long","A Long","A Long","A Site","A Long","A Long","A Long","A Long","A Long","A Site","A Long","A Long","A Long","A Long","A Long"]
        },
        {
            "img": "images/placeholder/unknown1.png",
            "desc": "Bind A Molly",
            "symbol": "C",
            "tags": ["Snakebite","A Site","A Bath"]
        },
        {
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else"
        },
        {
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else"
        },
        {
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else"
        },
        {
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else"
        },
        {
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else"
        },
        {
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else"
        },
        {
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else"
        },

        {
            "img": "images/placeholder/unknown.png",
            "desc": "This is a different card."
        }
    ]
}
function genCard(map) {
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
        if(pArray[i].tags != null)
        {
            for(b = 0; b < pArray[i].tags.length; b++)
            {
                var tagDiv = document.createElement('div');
                tagDiv.setAttribute('class', 'tag');
                var tagText = document.createElement('p');
                tagText.textContent = pArray[i].tags[b];
                tagDiv.appendChild(tagText);
                descDiv.appendChild(tagDiv);
            }
        }
        var lMore = document.createElement('button');
        lMore.innerHTML = 'Learn more...';
        pDiv.appendChild(descDiv);
        pDiv.appendChild(lMore);
        container.appendChild(pDiv);
    }
}