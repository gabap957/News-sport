const nameImage = document.getElementById('nameimage');
var isRed = true;
nameImage.setAttribute('style', 'text-overflow: ellipsis;overflow: hidden ; white-space: nowrap;');
nameImage.addEventListener('click', function () {
    isRed = !isRed;
    if (!isRed) {
        nameImage.setAttribute('style', 'text-overflow: unset;overflow: unset ; white-space: unset;');
    } else {
        nameImage.setAttribute('style', 'text-overflow: ellipsis;overflow: hidden ; white-space: nowrap;');
    }
});