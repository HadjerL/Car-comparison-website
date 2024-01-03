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
