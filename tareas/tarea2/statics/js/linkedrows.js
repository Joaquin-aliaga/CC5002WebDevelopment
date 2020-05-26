// funcion para hacer linkeables las filas
document.addEventListener('DOMContentLoaded', ()=>{
	const rows = document.querySelectorAll("tr[data-href]");
	
	rows.forEach( row=> {
		row.addEventListener("click", ()=> {
			window.location.href = row.dataset.href; //aqui se hace el link al href del html
		});

	});

});