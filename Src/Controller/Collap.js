function edit(id){
    $('.collapsible').collapsible('open',2);
    document.getElementById('id').value = id;
    document.getElementById('name').value = document.getElementById(id + ' nome').getAttribute("value");
    document.getElementById('value').value = document.getElementById(id + ' valor').getAttribute("value");
    document.getElementById('quantity').value = document.getElementById(id + ' qtd').getAttribute("value");
    $('html, body').animate({scrollTop:0}, 'slow');
}
