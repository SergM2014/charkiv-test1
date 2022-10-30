import './bootstrap';

let resultsMessage = document.getElementById('resultsMessage');
let resultsOutput = document.getElementById('resultsOutput');
let resultsTable = document.getElementById('resultsTable');

document.body.addEventListener('click', function(e){

    if(e.target.id === "submitSearch") {
        search();
    }

});

function search(){
    let formData = new FormData(document.getElementById('searchForm'));
    resultsMessage.classList.add('d-none');
    resultsMessage.classList.remove('alert-success', 'alert-danger');
    resultsTable.classList.add('d-none');
    resultsOutput.innerHTML = '';
    let alertClass = '';

    axios({
        withCredentials: true,
        method: 'POST',
        data: formData,
        url:'/api/search'
    })
        .then(response => response.data)
        .then(json => {
            resultsMessage.classList.remove('d-none')
            resultsMessage.innerHTML = json.utilities.message;
            resultsMessage.classList.add(json.utilities.success ? 'alert-success' : 'alert-danger');

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

            if(Object.keys(json.data).length > 0)
                resultsTable.classList.remove('d-none');

        })
        .catch(errors => {
            let json = errors.response.data;
            resultsMessage.classList.remove('d-none');
            resultsMessage.classList.add('alert-danger');
            resultsMessage.innerHTML = json.utilities.message;

        })
}