var cardJSON = {
    "cards": [
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
            "desc": "Somewhere to somewhere else"
        },
        
        {
            "img": "images/placeholder/unknown.png",
            "desc": "This is a different card."
        }
    ]
}
function genCard() {
    for (i = 0; i < cardJSON.cards.length; i++) {
        var pDiv = document.createElement('div');
        pDiv.setAttribute('class', 'gallery');
        var iA = document.createElement('a');
        iA.innerHTML = `<img src="${cardJSON.cards[i].img}" alt="" >`;
        iA.setAttribute('href', cardJSON.cards[i].img);
        pDiv.appendChild(iA);
        var descDiv = document.createElement('div');
        descDiv.setAttribute('class', 'card-desc');
        descDiv.innerHTML = `<p>${cardJSON.cards[i].desc}</p><div>Learn more...</div>`
        pDiv.appendChild(descDiv);
        document.body.appendChild(pDiv);
    }
}