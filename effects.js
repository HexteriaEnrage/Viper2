function changeHeader(img)
{
    document.getElementById('titlebar').style.backgroundImage =`url(images/${img}_map.png)`;
}
function resetHeader()
{
    document.getElementById('titlebar').style.backgroundImage = 'url(images/Edited-header.png)';
}