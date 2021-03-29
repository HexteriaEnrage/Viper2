function changeHeader(img)
{
    var titleimg = document.getElementById('titlebar');
    titleimg.setAttribute('class', '');
    titleimg.setAttribute('src', `images/${img}_map.png`);
    
    titleimg.setAttribute('class', 'in');
}
function resetHeader()
{
    var titleimg = document.getElementById('titlebar');
    titleimg.setAttribute('class', '');
    
}