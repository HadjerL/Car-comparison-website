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

    //-----------------------------------------------------------------------------
    // Function to update make options based on selected type
    function updateMakes() {
        const type = document.getElementById("type").value;
        const makeSelect = document.getElementById("make");
        makeSelect.innerHTML = "<option value=''>Select Make</option>"; // Clear existing options
        // Fetch make options from the server using AJAX
        fetch('getData.php?type=' + type)
            .then(response => response.text())
            .then(data => {
                makeSelect.innerHTML += data; // Append retrieved options to the select element
            });
        }
      // Event listener to trigger updating of make options
        document.getElementById("type").addEventListener("change", updateMakes);
      // Initial population of make options based on default type
        updateMakes();
})    
