$(function(){
    function resetInput(){
        $(`select option[value=""]`).prop('selected',true);
    }
    async function displayResult(data){
        console.log(data.vehiclechar.type);
        $.get('/Car-comparison-website/views/components/comparison.php', {data: data})
        .done(function(data) {
            $(`#result`).append(`<div>${data}</div>`);
        })
        .fail(function(jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.error("Request Failed: " + err);
        });
    }
    async function displayFormData() {
        try {
            const storedFormData = await new Promise((resolve, reject) => {
                let filledForms = sessionStorage.getItem('filledForms');
                filledForms = JSON.parse(filledForms)
                filledForms.forEach(form => {
                    const data = sessionStorage.getItem(`comparitionData${form}`);
                    const vehiclechar = sessionStorage.getItem(`formData${form}`);
                    if (data) {
                        const vehiculeInfo = {
                            vehiclechar : JSON.parse(vehiclechar),
                            spec:JSON.parse(data)
                        }
                        displayResult(vehiculeInfo);
                    } else {
                        reject(new Error('Form data not found in session storage'));
                    }
                });
            });
        } catch (error) {
            console.error('Error retrieving form data:', error);
        }
    }
    displayFormData();
})    
