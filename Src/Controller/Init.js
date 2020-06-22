window.onload=function(){
  $(document).ready(function() {
    M.AutoInit();
    $(".mask").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});
  });
}
