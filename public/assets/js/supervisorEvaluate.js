calculateTotalMarks= function()
{
    var A = document.getElementById('percentageA').value;
    var B = document.getElementById('percentageB').value;
    var total = parseFloat(A)+parseFloat(B);
    var final = total.toFixed(2)
    document.getElementById('totalSupervisor').value = final
    
     
   }
