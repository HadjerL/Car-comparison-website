$(function(){
    $('header button').on('click',()=>{
        $('header button svg.open-menu')[0].classList.toggle('hidden');
        $('header button svg.closed-menu')[0].classList.toggle('hidden');
        $('nav')[0].classList.toggle('hidden');
    })
    let slideIndex = 0;
    showSlides();
    
    function showSlides() {
        let i;
        let slides = $(".slide");
        let dots = $(".circle");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            dots[i].classList.remove("active");
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        if (slideIndex < 1) {slideIndex = slides.length}
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].classList.add("active");
        setTimeout(showSlides, 2000);
    }

    function updateMakes(formId) {
        const type = $(`#${formId} select[name^="type"]`).val();
        const makeSelect = $(`select[name^="make"]`);
        makeSelect.empty().append('<option value="">Select a make</option>');
        $.getJSON('./controller/ajaxController.php', { action: 'getMakesOfType', vehicule_type: type })
        .done(function(data) {
            if(data.length != 0){
                $.each(data, function(index, {make_name}) {
                    makeSelect.append($('<option>', {
                    value: make_name,
                    text: make_name
                }));
                });
            } else {
                makeSelect.append($('<option>',{
                    value: '',
                    text: '-'
                }))
            }
        })
        .fail(function(jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.error("Request Failed: " + err);
        });
    }
    function selctOthers(index){
        const selected_type = $(`#vehicule-form${index} select[name="type${index}"]`).val();
        $(`select[name^="type"] option[value="${selected_type}"]`).prop('selected',true);
    }
    $(`#vehicule-form0 select[name="type0"]`).on('change', ()=>{
        selctOthers(0);
        updateMakes("vehicule-form0");
    });
    $(`#vehicule-form1 select[name="type1"]`).on('change', ()=>{
        selctOthers(1);
        updateMakes("vehicule-form1");
    });
    $(`#vehicule-form2 select[name="type2"]`).on('change', ()=>{
        selctOthers(2);
        updateMakes("vehicule-form2");
    });
    $(`#vehicule-form3 select[name="type3"]`).on('change', ()=>{
        selctOthers(3);
        updateMakes("vehicule-form3");
    });
    updateMakes("vehicule-form0");
    updateMakes("vehicule-form1");
    updateMakes("vehicule-form2");
    updateMakes("vehicule-form3");

    function updateModals(formId) {
        const make = $(`#${formId} select[name^="make"]`).val();
        const modelSelect = $(`#${formId} select[name^="model"]`);
        modelSelect.empty().append('<option value="">Select a model</option>');
        $.getJSON('./controller/ajaxController.php', { action: 'getModelsOfMake', make_name: make })
        .done(function(data) {
            if(data.length != 0){
                $.each(data, function(index, {model_name}) {
                    modelSelect.append($('<option>', {
                    value: model_name,
                    text: model_name
                }));
                });
            } else {
                modelSelect.append($('<option>',{
                    value: '',
                    text: '-'
                }))
            }
        })
        .fail(function(jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.error("Request Failed: " + err);
        });
    }
    $(`#vehicule-form0 select[name="make0"]`).on('change', ()=>updateModals("vehicule-form0"));
    $(`#vehicule-form1 select[name="make1"]`).on('change', ()=>updateModals("vehicule-form1"));
    $(`#vehicule-form2 select[name="make2"]`).on('change', ()=>updateModals("vehicule-form2"));
    $(`#vehicule-form3 select[name="make3"]`).on('change', ()=>updateModals("vehicule-form3"));
    updateModals("vehicule-form0");
    updateModals("vehicule-form1");
    updateModals("vehicule-form2");
    updateModals("vehicule-form3");

    function updateGenerations(formId) {
        const model = $(`#${formId} select[name^="model"]`).val();
        const generationSelect = $(`#${formId} select[name^="generation"]`);
        generationSelect.empty().append('<option value="">Select a generation</option>');

        $.getJSON('./controller/ajaxController.php', { action: 'getGenerationsOfModel', model_name: model })
        .done(function(data) {
            if(data.length != 0){
                $.each(data, function(index, {generation_name,year_begin,year_end}) {
                    generationSelect.append($('<option>', {
                    value: `${generation_name} [${year_begin}-${year_end}]`,
                    text: `${generation_name} [${year_begin}-${year_end}]`
                }));
                });
            } else{
                generationSelect.append($('<option>',{
                    value: '',
                    text: '-'
                }))
            }
        })
        .fail(function(jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.error("Request Failed: " + err);
        });
    }
    $(`#vehicule-form0 select[name="model0"]`).on('change', ()=>updateGenerations("vehicule-form0"));
    $(`#vehicule-form1 select[name="model1"]`).on('change', ()=>updateGenerations("vehicule-form1"));
    $(`#vehicule-form2 select[name="model2"]`).on('change', ()=>updateGenerations("vehicule-form2"));
    $(`#vehicule-form3 select[name="model3"]`).on('change', ()=>updateGenerations("vehicule-form3"));
    updateGenerations("vehicule-form0");
    updateGenerations("vehicule-form1");
    updateGenerations("vehicule-form2");
    updateGenerations("vehicule-form3");

    function updateYears(formId) {
        const generationval = $(`#${formId} select[name^="generation"]`).val();
        const generation = generationval.slice(0,-12);
        const yearEnd = generationval.slice(-5,-1);
        const yearBegin = generationval.slice(-10,-6)
        const yearSelect = $(`#${formId} select[name^="year"]`);
        yearSelect.empty().append('<option value="">Select a year</option>');

        $.getJSON('./controller/ajaxController.php', { action: 'getYearsOfGeneration', generation_name: generation, year_begin:yearBegin , year_end: yearEnd})
        .done(function(data) {
            if(data.length != 0){
                $.each(data, function(index, {year_name}) {
                    yearSelect.append($('<option>', {
                    value: year_name,
                    text: year_name
                }));
                });
            } else{
                yearSelect.append($('<option>',{
                    value: '',
                    text: '-'
                }))
            }
        })
        .fail(function(jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.error("Request Failed: " + err);
        });
    }
    $(`#vehicule-form0 select[name="generation0"]`).on('change', ()=>updateYears("vehicule-form0"));
    $(`#vehicule-form1 select[name="generation1"]`).on('change', ()=>updateYears("vehicule-form1"));
    $(`#vehicule-form2 select[name="generation2"]`).on('change', ()=>updateYears("vehicule-form2"));
    $(`#vehicule-form3 select[name="generation3"]`).on('change', ()=>updateYears("vehicule-form3"));
    updateYears("vehicule-form0");
    updateYears("vehicule-form1");
    updateYears("vehicule-form2");
    updateYears("vehicule-form3");

    function updateImages(formId,formBoxId) {
        const year = $(`#${formId} select[name^="year"]`).val();
        const generationval = $(`#${formId} select[name^="generation"]`).val();
        const model = $(`#${formId} select[name^="model"]`).val();
        const make = $(`#${formId} select[name^="make"]`).val();
        const type = $(`#${formId} select[name^="type"]`).val();
        const generation = generationval.slice(0,-12);
        const yearEnd = generationval.slice(-5,-1);
        const yearBegin = generationval.slice(-10,-6)
        const imageDiv = $(`#${formBoxId}`);
        const car_figures = ["assets/cars/car one.png","assets/cars/car two.png"];
        imageDiv.empty()
        //$type_name,$make_name,$model_name,$generation_name,$year_begin,$year_end,$year_name
        $.getJSON('./controller/ajaxController.php', { action: 'getImageOfVehicule',type_name:type, make_name: make, model_name: model,generation_name: generation, year_begin: yearBegin, year_end: yearEnd, year_name: year})
        .done(function(data) {
            if(data.length != 0){
                console.log(data[0].path);
                imageDiv.empty().append(`<img class="compr-img" src="${data[0].path}">`);
                
            } else{
                console.log('d5alt')
                imageDiv.append(`<img class="compr-img" src="${car_figures[0]}">`);
            }
        })
        .fail(function(jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.error("Request Failed: " + err);
        });
    }
    $(`#vehicule-form0 select[name="year0"]`).on('change', ()=>updateImages("vehicule-form0"));
    $(`#vehicule-form1 select[name="year1"]`).on('change', ()=>updateImages("vehicule-form1"));
    $(`#vehicule-form2 select[name="year2"]`).on('change', ()=>updateImages("vehicule-form2"));
    $(`#vehicule-form3 select[name="year3"]`).on('change', ()=>updateImages("vehicule-form3"));
    updateImages("form-box0", "compr-img-cntner0");
    updateImages("form-box1", "compr-img-cntner1");
    updateImages("form-box2", "compr-img-cntner2");
    updateImages("form-box3", "compr-img-cntner3");
    function getData(id){
        const year = $(`#vehicule-form${id} select[name^="year"]`).val();
        const generationval = $(`#vehicule-form${id} select[name^="generation"]`).val();
        const model = $(`#vehicule-form${id} select[name^="model"]`).val();
        const make = $(`#vehicule-form${id} select[name^="make"]`).val();
        const type = $(`#vehicule-form${id} select[name^="type"]`).val();
        return {
            type: type,
            make: make,
            model: model,
            generation: generationval.slice(0,-12),
            yearBegin: generationval.slice(-10,-6),
            yearEnd: generationval.slice(-5,-1),
            year: year
        }
    }
    function isFilled(data){
        const filled = Object.keys(data).every((key) => {
            return data[key] !== '';
        });
        return filled;
    }
    function getFilledForms(){
        const formnumbers = []
        for(let i=0 ; i<4; i++){
            if(isFilled(getData(i))){
                formnumbers.push(i);
            }
        }
        return formnumbers;
    }
    function getFormCombinations(forms) {
        const combinations = [];
        for (let i = 0; i < forms.length; i++) {
            for (let j = i + 1; j < forms.length; j++) {
                combinations.push([forms[i], forms[j]]);
            }
        }
        return combinations;
    }
    function removeFirstAttribute(obj) {
        const keys = Object.keys(obj);
        const firstKey = keys[0];
        delete obj[firstKey];
        return obj;
    }
    function areDifferent(forms){
        const data1 = removeFirstAttribute(getData(forms[0]))
        const data2 = removeFirstAttribute(getData(forms[1]))
        const different = Object.keys(data1).every((key) => {
            return data1[key] !== data2[key];
        });
        return different;
    }
    function areAllDifferent(forms){
        const allDifferent = forms.every((form)=>{
            return areDifferent(form);
        })
        return allDifferent
    }
    function isFormValid() {
        const filledForms = getFilledForms();
        const allCombinations = getFormCombinations(filledForms);
        const form = $(`#form-container`);
        const errorMessage = $(`section.comparison div.error-message-container`)
        if (filledForms.length < 2 || !areAllDifferent(allCombinations)) {
            return false;
        } else {
            form.off('submit').submit();
            errorMessage[0].classList.add('hidden');
            form.css({
                'border' : 'none'
            })
            return true;
        }
    }
    function compare(){
        const filledForms = getFilledForms();
        const allCombinations = getFormCombinations(filledForms);
        const form = $(`#form-container`);
        const errorMessage = $(`section.comparison div.error-message-container`)
        console.log(filledForms,allCombinations,areAllDifferent(allCombinations))
        form.submit((event)=>{
            if(!isFormValid()){
                event.preventDefault();
                errorMessage[0].classList.remove('hidden')
                form.css({
                    'border':'var(--red) 2px solid'
                })
            }
        })
    }
    $(`section.comparison button`).on("click",compare)
})    







/**
SELECT id_vehicule FROM vehicule WHERE
id_v_year = (SELECT id_v_year FROM v_year WHERE year_name = "2015") and
id_make = (SELECT id_make FROM make where make_name = "BMW") and
id_model = (SELECT id_model FROM model WHERE model_name = "2 serie") and
id_generation = (SELECT id_generation FROM generation WHERE generation_name = "F22/F23" and year_begin = 2013 and year_end = 2017) and
id_vehicule_type = (SELECT id_vehicule_type FROM vehicule_type WHERE type_name = "Car"); 
*/

/** 
 * const year = $(`[id^="vehicule-form"] select[name^="year"]`);
        const generationval = $(`[id^="vehicule-form"] select[name^="generation"]`);
        const model = $(`[id^="vehicule-form"] select[name^="model"]`);
        const make = $(`[id^="vehicule-form"] select[name^="make"]`);
        const type = $(`[id^="vehicule-form"] select[name^="type"]`);
        // const generation = generationval.slice(0,-12);
        // const yearEnd = generationval.slice(-5,-1);
        // const yearBegin = generationval.slice(-10,-6)
        // console.log(year,generationval,model,make,type)
*/

