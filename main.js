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

