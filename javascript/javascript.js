// Grab all the HTML elements with the class name step and create an array to store them
const steps = Array.from(document.querySelectorAll("form .step"));

// Grab all the HTML buttons using their class names 
const nextButton = document.querySelectorAll("form .nextButton");
const previousButton = document.querySelectorAll("form .previousButton");
const submitButton = document.querySelectorAll("form .submitButton");

// Grab the form to be used to get input later
const form = document.querySelector("form");

// Adding the onClick event for any button of class nextButton 
// Calls changeStep() to go forward a step in the form
nextButton.forEach((button) => 
{
    button.addEventListener("click", () => 
    {   
        changeStep("next");
    });
});

// Adding the onClick event for any button of class previousButton 
// Calls changeStep() to go backwards a step in the form
previousButton.forEach((button) => 
{
    button.addEventListener("click", () => 
    {
        changeStep("previous");
    });
});

function changeStep(btn) 
{  
    let index = 0; 
    
    // Grab the current active screen and assign it to a variable
    const active = document.querySelector(".active");  

    // Grab the position of active screen in steps array 
    index = steps.indexOf(active);  

    // Remove the active screen so new screen can be shown based of following if statements
    steps[index].classList.remove("active"); 
    
    // If a button of class nextButton is pressed go forward one screen in the array 
    if (btn === "next") 
    {  
        // Call the checkForm() function to validate input entries
        check = checkForm(index);

        if (index == 2)
        {
            checkDrivingBan();
        }


        if (check != true)
        {
            index++;
        }  
    }

    // If a button of class previousButton is pressed go back one screen in the array
    else if (btn === "previous") 
    {  
        index--;  
    }

    // Set the screen that is in postion "index" and assign it as active
    steps[index].classList.add("active");  
}

function checkForm(index)
{
    if (index != 0)
    {
        let step = index + 1;
        let inputs;
        // Grab all the input boxes on the current screen
        if (document.getElementById('step-' + step).getElementsByTagName('input') === null)
        {
            
        }
        else 
        {
            inputs = document.getElementById('step-' + step).getElementsByTagName('input');
        }
        // Grab all the drop down menus on the current screen
        let selections = document.getElementById('step-' + step).getElementsByTagName('select');

        // Check if the current screen contains input boxes 
        // If it does then...
        if (inputs.length > 0)
        {
            for (let i = 0; i < inputs.length; i++)
            {
                // If value is empty or null for input boxes 
                // Then form has not been completed as intended
                if (inputs[i].value == null || inputs[i].value == '')
                {
                    // Show the user a message requesting they fill in empty fields
                    alert("Please fill in all the fields!");

                    // Return true so the next screen can be moved onto 
                    return true;
                }
            }            
        }

        // Check if the current screen has drop down menus 
        // If it does then...
        if (selections.length > 0)
        {
            for (let i = 0; i < selections.length; i++)
            {
                // If value is the default - for drop downs 
                // Then form has not been completed as intended
                if (selections[i].value == "-")
                {
                    // Show the user a message requesting they fill in empty fields
                    alert("Please fill in all the fields!");
                    
                    // Return true so the next screen can be moved onto 
                    return true;
                }
            }          
        }
    }
}

function checkDrivingBan()
{
    // Logic to not allow user to proceed if driving banned

    // Grab all the drop down menus on the current screen
    let selections = document.getElementById('step-' + 3).getElementsByTagName('select');

    if (selections[2].value == "Yes")
    {
        // Show the user a message requesting they fill in empty fields
        alert("You do not meet the requirements for this service!");

        window.location.replace("https://kunet.uk/kevin/controller/homePage.php");
    }
}

