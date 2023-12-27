var cargarDatatable = function(parametro1,parametro2){

	$(parametro1).click(function (e) {

	    
	
		
	  });
	
};


var funcion__abrirDatatableAnexosDocumentos__paid_infraestructura_revisor=function(tbody,tabla,classBtn,titulo){

    
    $(tbody).on("click","a."+classBtn,function(e){

        
        e.preventDefault();

        let data=tabla.DataTable().row($(this).parents("tr")).data();
        var size=tabla.DataTable().rows().count();

        $("#tituloModalDocumentosInfraestructura").text(titulo);

        var cuerpo = document.getElementById('divDocumentosInfraestructura');
  
        $("#divDocumentosInfraestructura div").remove();
       
  
         

        if(titulo.includes("Obra")){
    
            cuerpo.insertAdjacentHTML('beforeend','<div><centre><table id="anexosInfraestructura"><thead><tr><th>Número</th><th>Documento</th><th>Tipo</th></tr></thead><tbody id="anexosInfraestructuraTbody"></tbody></table></centre></div>');

            datatabletsPaidRevisorVacio($("#anexosInfraestructura"),"anexosInfraestructura","s",objetosPaidInfraestructura2023([1],["enlace"],[1],[$("#filesFrontend").val()+"paid/documentos__infraestructura/"],[1]),[data[3],data[4],data[2]],"");
        
        }else if(titulo.includes("Directos")){

            cuerpo.insertAdjacentHTML('beforeend','<div><centre><table id="beneficiarioDirectoInfraestructura"><thead><tr><th>Rango Desde</th><th>Rango Hasta</th><th>Masculino</th><th>Femenino</th><th>Mestizo</th><th>Montubio</th><th>Indigena</th><th>Blanco</th><th>Afro</th><th>Total Beneficiarios</th></tr></thead><tbody id="beneficiarioDirectoInfraestructuraTbody"></tbody></table></centre></div>');

            datatabletsPaidRevisorVacio($("#beneficiarioDirectoInfraestructura"),"beneficiarioDirectoInfraestructura","s",false,[data[3],data[4],data[2]],"");

        }else if(titulo.includes("Adaptado")){

            cuerpo.insertAdjacentHTML('beforeend','<div><centre><table id="beneficiarioAdaptadoInfraestructura"><thead><tr><th>Rango Desde</th><th>Rango Hasta</th><th>Masculino</th><th>Femenino</th><th>Mestizo</th><th>Montubio</th><th>Indigena</th><th>Blanco</th><th>Afro</th><th>Visual</th><th>Auditivo</th><th>Multisensorial</th><th>Intelectual</th><th>Física</th><th>Psiquico</th><th>Total Beneficiarios</th></tr></thead><tbody id="beneficiarioAdaptadoInfraestructuraTbody"></tbody></table></centre></div>');

            datatabletsPaidRevisorVacio($("#beneficiarioAdaptadoInfraestructura"),"beneficiarioAdaptadoInfraestructura","s",false,[data[3],data[4],data[2]],"");

        }else if(titulo.includes("Fiscalización")){
    
            cuerpo.insertAdjacentHTML('beforeend','<div><centre><table id="anexosInfraestructuraFiscalizacion"><thead><tr><th>Número</th><th>Documento</th><th>Tipo</th></tr></thead><tbody id="anexosInfraestructuraTbody"></tbody></table></centre></div>');

            datatabletsPaidRevisorVacio($("#anexosInfraestructuraFiscalizacion"),"anexosInfraestructuraFiscalizacion","s",objetosPaidInfraestructura2023([1],["enlace"],[1],[$("#filesFrontend").val()+"paid/documentos__infraestructura/"],[1]),[data[3],data[4],data[2]],"");
        
        }
      
        

        
    });
        
}