let cssId = 'myCss';  // you could encode the css path itself to generate id..
let cssId2 = 'myCssAdd';
let ver = '517'
if (!document.getElementById(cssId)) {
    var head = document.getElementsByTagName('head')[0];
    var link = document.createElement('link');
    link.id = cssId;
    link.rel = 'stylesheet';
    link.type = 'text/css';
    link.href = '/style/style.css?ver=' + ver;
    link.media = 'all';
    head.appendChild(link);
}
if (!document.getElementById(cssId2)) {
    var head = document.getElementsByTagName('head')[0];
    var link = document.createElement('link');
    link.id = cssId;
    link.rel = 'stylesheet';
    link.type = 'text/css';
    link.href = '/style/style-adaptive.css?ver=' + ver;
    link.media = 'all';
    head.appendChild(link);
}