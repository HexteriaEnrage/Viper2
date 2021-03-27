var cardJSON = {
    "ascent": [
        {
            "img": "images/placeholder/unknown.png",
            "desc": "Somewhere to somewhere else",
            "tags": ["Orb","A Site","A Long"]
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
        iA.setAttribute('href', pArray[i].img);
        pDiv.appendChild(iA);
        var descDiv = document.createElement('div');
        descDiv.setAttribute('class', 'card-desc');
        descDiv.innerHTML = `<p>${pArray[i].desc}</p><div>Learn more...</div>`
        pDiv.appendChild(descDiv);
        container.appendChild(pDiv);
    }
}