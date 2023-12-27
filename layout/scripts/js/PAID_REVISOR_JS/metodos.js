var MostrarModalObligaciones = function(parametro1,parametro2){

	$(parametro1).click(function (e) {

    
        var modal = $(parametro2);

        modal.show();

     
	  });
	
};

var checkObligacionesMinisterio = function(parametro1){

	$(parametro1).click(function (e) {

    
        if (!document.getElementById('obligacionesMinisterio__check1').checked)
        {
            $('#obligacionesMinisterio__checked1').val("style='display: none;'");
        }else{
            $('#obligacionesMinisterio__checked1').val("");
        }
        if (!document.getElementById('obligacionesMinisterio__check2').checked)
        {
            $('#obligacionesMinisterio__checked2').val("style='display: none;'");
        }else{
            $('#obligacionesMinisterio__checked2').val("");
        }
        if (!document.getElementById('obligacionesMinisterio__check3').checked)
        {
            $('#obligacionesMinisterio__checked3').val("style='display: none;'");
        }else{
            $('#obligacionesMinisterio__checked3').val("");
        }
        if (!document.getElementById('obligacionesMinisterio__check4').checked)
        {
            $('#obligacionesMinisterio__checked4').val("style='display: none;'");
        }else{
            $('#obligacionesMinisterio__checked4').val("");
        }
        if (!document.getElementById('obligacionesMinisterio__check5').checked)
        {
            $('#obligacionesMinisterio__checked5').val("style='display: none;'");
        }else{
            $('#obligacionesMinisterio__checked5').val("");
        }
        if (!document.getElementById('obligacionesMinisterio__check6').checked)
        {
            $('#obligacionesMinisterio__checked6').val("style='display: none;'");
        }else{
            $('#obligacionesMinisterio__checked6').val("");
        }

        if ($("#obligacionesMinisterioAdicional").val()== "")
        {
            $('#obligacionesMinisterioAdicionalcheck').val("style='display: none;'");
        }else{
            $('#obligacionesMinisterioAdicionalcheck').val("");
        }

        var modal = $("#modalObligacionesMinisterio");

        modal.hide();

     
	  });
	
};

var checkObligacionesOrganismo = function(parametro1){

	$(parametro1).click(function (e) {

    
        if (!document.getElementById('obligacionesOD__check1').checked)
        {
            $('#obligacionesOD__checked1').val("style='display: none;'");
        }else{
            $('#obligacionesOD__checked1').val("");
        }
        if (!document.getElementById('obligacionesOD__check2').checked)
        {
            $('#obligacionesOD__checked2').val("style='display: none;'");
        }else{
            $('#obligacionesOD__checked2').val("");
        }
        if (!document.getElementById('obligacionesOD__check3').checked)
        {
            $('#obligacionesOD__checked3').val("style='display: none;'");
        }else{
            $('#obligacionesOD__checked3').val("");
        }
        if (!document.getElementById('obligacionesOD__check4').checked)
        {
            $('#obligacionesOD__checked4').val("style='display: none;'");
        }else{
            $('#obligacionesOD__checked4').val("");
        }
        if (!document.getElementById('obligacionesOD__check5').checked)
        {
            $('#obligacionesOD__checked5').val("style='display: none;'");
        }else{
            $('#obligacionesOD__checked5').val("");
        }
        if (!document.getElementById('obligacionesOD__check6').checked)
        {
            $('#obligacionesOD__checked6').val("style='display: none;'");
        }else{
            $('#obligacionesOD__checked6').val("");
        }
        if (!document.getElementById('obligacionesOD__check7').checked)
        {
            $('#obligacionesOD__checked7').val("style='display: none;'");
        }else{
            $('#obligacionesOD__checked7').val("");
        }
        if (!document.getElementById('obligacionesOD__check8').checked)
        {
            $('#obligacionesOD__checked8').val("style='display: none;'");
        }else{
            $('#obligacionesOD__checked8').val("");
        }

        if ($("#obligacionesODAdicional").val()== "")
        {
            $('#obligacionesODAdicionalcheck').val("style='display: none;'");
        }else{
            $('#obligacionesODAdicionalcheck').val("");
        }


        var modal1 = $("#modalObligacionesOrganismo");

        modal1.hide();

     
	  });
	
};