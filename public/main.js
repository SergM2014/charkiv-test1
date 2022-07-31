let resultsMessage = document.getElementById('resultsMessage');
let resultsOutput = document.getElementById('resultsOutput');
let resultsTable = document.getElementById('resultsTable');

document.body.addEventListener('click', function(e){

    if(e.target.id === "submitSearch") {
       search();
    }

});

function search(){
	let searchForm = document.getElementById('searchForm');
	let formData = new FormData(searchForm);

	resultsMessage.classList.add('d-none');
	resultsMessage.classList.remove('alert-success', 'alert-danger');
	resultsTable.classList.add('d-none');
	resultsOutput.innerHTML = '';

	fetch('/api/search',
            {
                method: "POST",
                body: formData,
                credentials:'same-origin'
            })
            .then(responce => responce.json())
            .then(json => {

            	resultsMessage.classList.remove('d-none')

            	resultsMessage.innerHTML = json.utilities.message;

            	let alertClass = json.utilities.success ? 'alert-success' : 'alert-danger';
				resultsMessage.classList.add(alertClass);

				let counter=1;
            	for(let item of json.data) {
            		let rowElement = document.createElement('tr');


            		rowElement.innerHTML =
            		`<th scope="row">${counter++}</th>
            		 <td>${item.name}</td>
  				       <td>${item.price}</td>
        				 <td>${item.bedrooms}</td>
        			  	<td>${item.bathrooms}</td>
        			  	<td>${item.storeys}</td>
        		  		<td>${item.garages}</td>`

            		resultsOutput.appendChild(rowElement);
            	}

            	resultsTable.classList.remove('d-none');

            })
}
