let currentIndex=0;
function navigate(element) {
    let d=document.getElementById(element);
    document.addEventListener("keydown",function (event) {
        switch (event.keyCode) {
            case 38:
                currentIndex = (currentIndex === 0) ? d.elements.length - 1 : --currentIndex;
                d[currentIndex].focus();
                break;
            case 40:
                currentIndex = ((currentIndex + 1) === d.elements.length) ? 0 : ++currentIndex;
                d[currentIndex].focus();
                break;
        }
    });
}
