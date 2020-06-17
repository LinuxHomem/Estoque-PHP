function edit(id){
    $('.collapsible').collapsible('open',2);
    $('html, body').animate({scrollTop:0}, 'slow');

    var idd = document.getElementById('id');
    var nome = document.getElementById('name');
    var value = document.getElementById('value');
    var quantity = document.getElementById('quantity');

    var lbidd = document.getElementById('lbid');
    var lbnome = document.getElementById('lbname');
    var lbvalue = document.getElementById('lbvalue');
    var lbquantity = document.getElementById('lbquantity');

    idd.value = id;
    nome.value = document.getElementById(id + ' nome').getAttribute("value");
    value.value = document.getElementById(id + ' valor').getAttribute("value");
    quantity.value = document.getElementById(id + ' qtd').getAttribute("value");

    lbidd.classList.add("active");
    lbnome.classList.add("active");
    lbvalue.classList.add("active");
    lbquantity.classList.add("active");
}
