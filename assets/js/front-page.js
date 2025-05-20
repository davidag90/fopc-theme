const accesos = document.querySelectorAll("#accesos-rapidos > div");

accesos.forEach(function (elem) {
    let reemplazo = elem.cloneNode(true);
    let linkEnvelope = document.createElement("a");
    let anchorTag = elem.querySelector('p > a');
    let link = anchorTag.getAttribute("href");
    
    linkEnvelope.appendChild(reemplazo);
    linkEnvelope.setAttribute("href", link);

    elem.parentNode.replaceChild(linkEnvelope, elem);
});