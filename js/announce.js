$(document).ready(function(){

    $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'arrows',
            autoAdjustHeight:true,
            transitionEffect:'fade',
            showStepURLhash: false,
         
    });

});



function submitForm() {
    // Get the values from the form
    var category = $("#category").val();
    var nameOfJob = $("#nameOfJob").val();
    var jobDescription = $("#jobDescription").val();
    var city = $("#city").val();
    
    // Log the values to the console
    console.log("Category: " + category);
    console.log("Name of Job: " + nameOfJob);
    console.log("Job Description: " + jobDescription);
    console.log("City: " + city);
  }
  